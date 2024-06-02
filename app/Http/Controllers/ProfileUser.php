<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileUser extends Controller
{
    public function index()
    {
        $user = User::with('profile')->where('id', auth()->user()->id)->first();
        $certification = Certification::with('user')->where('user_id', auth()->user()->id)->get();

        // dd($user, $certification);
        return view('profile.index');
    }
}
