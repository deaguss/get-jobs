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
use Illuminate\Validation\ValidationException;

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

        return view('auth.verifyOtp', ['id' => $user->id]);
    }

    public function showLoginForm()
    {
        return view('auth.signIn');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required','email',
            'password' => 'required', 'password','min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi yang diberikan tidak sesuai dengan data kami.',
            ])->errorBag('auth')->redirectTo('/sign-in');
        }

        if($user->tokens()->count() > 0){
            $userId = $user->id;

            $user->tokens()->where('tokenable_id', $userId)->delete();
        }

        $token = $user->createToken('web-login-token')->plainTextToken;
        session(['token' => $token]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
    }

    public function showOtpForm()
    {
        return view('auth.verifyOtp');
    }

    public function verifyOtp(Request $request, $id = null)
    {
        $newUser = User::where('id', $id)->first();

        $otpArray = str_split($newUser->otp);

        if ($request->otp === $otpArray
        && Carbon::now()->lessThanOrEqualTo($newUser->otp_expires_at))
        {
            $newUser->otp = null;
            $newUser->otp_expires_at = null;
            $newUser->email_verified_at = Carbon::now();
            $newUser->save();

            return redirect()->route('sign.in.form');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
