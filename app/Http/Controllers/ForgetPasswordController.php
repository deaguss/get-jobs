<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return view('auth.forgetPassword', ['errors' => 'We can\'t find a user with that e-mail address.']);
        }

        $user->createPasswordResetToken();

        Mail::to($user->email)->send(new ResetPasswordMail($user));

        return view('auth.forgetPassword', ['success' => 'We have e-mailed your password reset link.']);
    }

    public function showResetPasswordForm($token = null)
    {
        return view('auth.setPassword', ['token' => $token]);
    }

    public function resetPassword(Request $request, $token = null)
    {
        $request->validate([
            'password' =>
            'required|
            min:6|
            confirmed|
            regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
        ],
        [
            'password.regex' => 'Passwords must contain at least one uppercase letter, one special character, and one number.'

        ]);

        $user = User::where('reset_password_token', $token)->first();

        if (! $user) {
            return view('auth.setPassword', ['errors' => 'This password reset token is invalid.']);
        }

        if($user->reset_password_token_expires_at < now()){
            return view('auth.setPassword', ['errors' => 'This password reset token has expired.']);
        }

        $user->password = Hash::make($request->password);
        $user->reset_password_token = null;
        $user->save();

        return view('auth.signIn', ['success' => 'Your password has been reset.']);
    }


}
