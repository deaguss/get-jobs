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

        $datas = array_merge($user->toArray(),
        ['certifications' => $certification->toArray()]);

        $datas = json_decode(json_encode($datas));

        $idParts = explode('-', $datas->id);
        $shortId = $idParts[0];

        $datas->short_id = $shortId;

        return view('profile.index', ['datas' => $datas]);
    }
}
