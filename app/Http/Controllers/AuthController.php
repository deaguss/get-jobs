<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifyOtp;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.signUp');
    }

    public function register(AuthRequest $request)
    {

        $user = User::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => Str::random(4),
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new VerifyOtp($user));

        return redirect()->route('verify.otp');
    }

    public function showLoginForm()
    {
        return view('auth.signIn');
    }

    public function login(AuthRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showOtpForm()
    {
        return view('auth.verifyOtp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

        dd($request->otp);

        // $user = Auth::user();
        // $newUser = User::where('id', $user->id)->first();

        // if ($user->otp === $request->otp && Carbon::now()->lessThanOrEqualTo($user->otp_expires_at)) {
        //     foreach(){

        //     }
        //     $newUser->otp = null;
        //     $newUser->otp_expires_at = null;
        //     $newUser->email_verified_at = Carbon::now();
        //     $newUser->save();

        //     return redirect()->intended('/');
        // }

        // return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
