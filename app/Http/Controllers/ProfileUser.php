<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Certification;
use App\Models\JobAdvertisement;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileUser extends Controller
{
    public function index(Request $request)
    {
        $user = User::with('profile')->where('id', auth()->user()->id)->first();

        $certification = Certification::with('user')->where('user_id', auth()->user()->id)->get();

        $datas = array_merge($user->toArray(), ['certifications' => $certification->toArray()]);

        $datas = json_decode(json_encode($datas));

        $idParts = explode('-', $datas->id);
        $shortId = $idParts[0];
        $datas->short_id = $shortId;

        $arraySkills = [];

        if ($user->profile && $user->profile->skills !== null) {
            $idSkills = explode(',', $datas->profile->skills);

            foreach ($idSkills as $key => $value) {
                $arraySkills[] = Str::upper($value);
            }

            $datas->skills = $arraySkills;
        }

        // dd($datas);

        return view('profile.index', ['datas' => $datas]);
    }


    public function updateProfile(ProfileRequest $request)
    {
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Profile not found');

        $user->update([
            'first_name' => $request->first_name ?? $user->first_name,
            'last_name' => $request->last_name ?? $user->last_name,
            'address' => $request->address ?? $user->address,
            'city' => $request->city ?? $user->city,
            'phone' => $request->phone ?? $user->phone,
            'country' => $request->country ?? $user->country,
            'postal_code' => $request->postal_code ?? $user->postal_code,
        ]);

        if($user->profile == null){
            $user->profile()->create([
                'id' => $user->id,
                'user_id' => $user->id,
                'hobbies' => $request->hobbies ?? 'none',
                'avaliable' => $request->avaliable ? '1' : '0',
            ]);
        }else {
            $user->profile()->update([
                'user_id' => $user->id,
                'hobbies' => $request->hobbies ?? 'none',
                'avaliable' => $request->avaliable ? '1' : '0',
            ]);
        }

        Session::flash('success', 'Profile updated successfully');

        return redirect()->back();
    }

    public function updateSummary(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Personal summary not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'personal_summmary' => $request->personal_summmary
        ]);


        Session::flash('success', 'Personal summary updated successfully');

        return redirect()->back();
    }

    public function updateAvatar(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Avatar not found');

        $imageFile = $request->file('avatar');
        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();

        $storagePath = 'public/avatars';
        $imageFile->storeAs($storagePath, $imageName);

        if ($user->avatar != null) {
            Storage::delete($storagePath . '/' . $user->avatar);
        }

        $user->update([
            'avatar' => $imageName
        ]);

        Session::flash('success', 'Avatar updated successfully!');

        return redirect()->back();
    }

    public function updateCareer(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Career history not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'recent_work' => $request->recent_work
        ]);

        Session::flash('success', 'Career history updated successfully');

        return redirect()->back();
    }
    public function updateEducation(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Recent education not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'recent_education' => $request->recent_education
        ]);

        Session::flash('success', 'Recent education updated successfully');

        return redirect()->back();
    }

    public function updateSkills(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Skills not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'skills' => $request->skills
        ]);

        Session::flash('success', 'Skills updated successfully');

        return redirect()->back();
    }
    public function updateLanguages(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Languages not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'languages' => $request->languages
        ]);

        Session::flash('success', 'Languages updated successfully');

        return redirect()->back();
    }

    public function updateResume(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Resume not found');

        $resumeFile = $request->file('resume');
        $resumeName = time(). '-' . $resumeFile->getClientOriginalName();

        $storagePath = 'public/resume';
        $resumeFile->storeAs($storagePath, $resumeName);

        if ($user->profile->resume != null) {
            Storage::delete($storagePath . '/' . $user->profile->resume);
        }

        $user->profile->update([
            'resume' => $resumeName
        ]);

        Session::flash('success', 'Resume updated successfully!');

        return redirect()->back();
    }

    public function updateIsVisible(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('errors', 'Is Visible  not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'is_visible' => $request->is_visible ? '1' : '0',
        ]);

        Session::flash('success', 'Is Visible updated successfully');

        return redirect()->back();
    }

    public function addCerti(CertificateRequest $request){
        $imageFile = $request->file('certi_img');
        $imageName = time() . '.' . $imageFile->getClientOriginalName();

        $storagePath = 'public/certi';
        $imageFile->storeAs($storagePath, $imageName);

        Certification::create([
            'certi_img' => $imageName,
            'user_id' => auth()->user()->id,
            'certi_name' => $request->certi_name,
            'certi_description' => $request->certi_description
        ]);

        Session::flash('success', 'Certificate added successfully!');

        return redirect()->back();
    }

    public function bookmark()
    {
        $savedJobs = $this->savedJobs();
        $savedJobByUsers = $this->savedJobByUsers();

        return view('profile.bookmark',
        [
            'savedJobs' => $savedJobs,
            'savedJobByUsers' => $savedJobByUsers
        ]);
    }

    public function savedJobs(){
        return JobAdvertisement::with(['company', 'savedByUsers'])
            ->whereHas('savedByUsers', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->get();
    }


    public function savedJobByUsers()
    {
        return SavedJob::
        where('user_id', auth()->user()->id)->get();
    }
}

