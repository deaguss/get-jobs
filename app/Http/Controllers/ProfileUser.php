<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileUser extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
}
