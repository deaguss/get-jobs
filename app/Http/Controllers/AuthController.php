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

        return view('auth.verifyOtp', ['id' => $user->id]);
    }

    public function showLoginForm()
    {
        return view('auth.signIn');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(
                ['email' => 'The email or password provided does not match our data.']
            );
        }

        if($user->tokens()->count() > 0){
            $userId = $user->id;

            $user->tokens()->where('tokenable_id', $userId)->delete();
        }

        $token = $user->createToken('web-login-token')->plainTextToken;
        session(['token' => $token]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function showOtpForm()
    {
        return view('auth.verifyOtp');
    }

    public function verifyOtp(Request $request, $id = null)
    {
        try {
        $newUser = User::findOrFail($id);

        $otpArray = str_split($newUser->otp);

        if ($request->otp === $otpArray
        && Carbon::now()->lessThanOrEqualTo($newUser->otp_expires_at))
        {
            $newUser->otp = null;
            $newUser->otp_expires_at = null;
            $newUser->email_verified_at = Carbon::now();
            $newUser->save();

            return redirect()->route('sign.in.form');
        }else {
            return view('auth.verifyOtp', [
                'id' => $id,
                'errors'=> ['Invalid or expired OTP.']
            ]);
        }
    } catch (\Exception $e) {
        return view('auth.verifyOtp', [
            'id' => $id,
            'errors'=> ['Verification failed. Please try again.']
        ]);
        }
    }

        public function resendOtp($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->otp = Str::random(4);
            $user->otp_expires_at = Carbon::now()->addMinutes(10);
            $user->save();

            Mail::to($user->email)->send(new VerifyOtp($user));

            $successMessage = 'A new OTP has been sent to your email address.';

            return view('auth.verifyOtp', [
                'id' => $id,
                'success' => $successMessage
            ]);
        } catch (\Exception $e) {
            return view('auth.verifyOtp', [
                'id' => $id,
                'errors' => ['Failed to resend OTP. Please try again.']
            ]);
        }
    }
}
