<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            Session::flash('errors', 'We can\'t find a user with that e-mail address.');
            return view('auth.forgetPassword');
        }

        $user->createPasswordResetToken();

        Mail::to($user->email)->send(new ResetPasswordMail($user));

        Session::flash('success', 'We have e-mailed your password reset link!');
        return view('auth.forgetPassword');
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
            Session::flash('errors' , 'This password reset token is invalid.');
            return view('auth.setPassword');
        }

        if($user->reset_password_token_expires_at < now()){
            Session::flash('errors' , 'This password reset token has expired. Please try again. ');
            return view('auth.setPassword');
        }

        $user->password = Hash::make($request->password);
        $user->reset_password_token = null;
        $user->save();

        Session::flash('success' , 'Your password has been reset.');
        return view('auth.signIn');
    }


}
