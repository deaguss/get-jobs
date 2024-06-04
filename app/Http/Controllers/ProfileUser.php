<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Certification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

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

        // dd($datas);
        return view('profile.index', ['datas' => $datas]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_profile', 'Profile not found');

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);

        if($user->profile == null){
            $user->profile()->create([
                'id' => $user->id,
                'user_id' => $user->id,
                'hobbies' => $request->hobbies,
                'avaliable' => $request->avaliable ? '1' : '0',
            ]);
        }else {
            $user->profile()->update([
                'user_id' => $user->id,
                'hobbies' => $request->hobbies,
                'avaliable' => $request->avaliable ? '1' : '0',
            ]);
        }

        Session::flash('success_profile', 'Profile updated successfully');

        return redirect()->back();
    }

    public function updateSummary(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_summary', 'Personal summary not found');

        if($user->profile->personal_summmary == null && $user->profile ){
            $user->profile()->create([
                'id' => $user->id,
                'user_id' => $user->id,
                'personal_summmary' => $request->personal_summmary
            ]);
        }else {
            $user->profile()->update([
                'user_id' => $user->id,
                'personal_summmary' => $request->personal_summmary
            ]);
        }

        Session::flash('success_summary', 'Personal summary updated successfully');

        return redirect()->back();
    }

    public function updateAvatar(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_avatar', 'Avatar not found');

        $imageFile = $request->file('avatar');
        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();

        $storagePath = 'public/avatars';
        $imageFile->storeAs($storagePath, $imageName);

        $user->update([
            'avatar' => $imageName
        ]);

        Session::flash('success_avatar', 'Avatar updated successfully!');

        return redirect()->back();
    }

    public function updateCareer(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_recent_work', 'Career history not found');

        if($user->profile->recent_work == null && $user->profile ){
            $user->profile()->create([
                'id' => $user->id,
                'user_id' => $user->id,
                'recent_work' => $request->recent_work
            ]);
        }else {
            $user->profile()->update([
                'user_id' => $user->id,
                'recent_work' => $request->recent_work
            ]);
        }

        Session::flash('success_recent_work', 'Career history updated successfully');

        return redirect()->back();
    }
}

