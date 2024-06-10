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
    public function index()
    {
        $user = User::with('profile')->where('id', auth()->user()->id)->first();
        $certification = Certification::with('user')->where('user_id', auth()->user()->id)->get();

        $datas = array_merge($user->toArray(),
        ['certifications' => $certification->toArray()]);

        $datas = json_decode(json_encode($datas));

        // short id
        $idParts = explode('-', $datas->id);
        $shortId = $idParts[0];
        $datas->short_id = $shortId;

        // short skills
        $idSkills = explode(',', $datas->profile->skills);
        foreach ($idSkills as $key => $value) {
            $arraySkills[] = Str::upper($value);
        }
        $datas->skills = $arraySkills;

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

        $user->profile()->update([
            'user_id' => $user->id,
            'personal_summmary' => $request->personal_summmary
        ]);


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

        if ($user->avatar != null) {
            Storage::delete($storagePath . '/' . $user->avatar);
        }

        $user->update([
            'avatar' => $imageName
        ]);

        Session::flash('success_avatar', 'Avatar updated successfully!');

        return redirect()->back();
    }

    public function updateCareer(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_recent_work', 'Career history not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'recent_work' => $request->recent_work
        ]);

        Session::flash('success_recent_work', 'Career history updated successfully');

        return redirect()->back();
    }
    public function updateEducation(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_recent_education', 'Recent education not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'recent_education' => $request->recent_education
        ]);

        Session::flash('success_recent_education', 'Recent education updated successfully');

        return redirect()->back();
    }

    public function updateSkills(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_recent_skills', 'Skills not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'skills' => $request->skills
        ]);

        Session::flash('success_recent_education', 'Skills updated successfully');

        return redirect()->back();
    }
    public function updateLanguages(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_recent_languages', 'Languages not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'languages' => $request->languages
        ]);

        Session::flash('success_recent_languages', 'Languages updated successfully');

        return redirect()->back();
    }

    public function updateResume(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_resume', 'Resume not found');

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

        Session::flash('success_resume', 'Resume updated successfully!');

        return redirect()->back();
    }

    public function updateIsVisible(ProfileRequest $request){
        $user = User::find(auth()->user()->id);

        if($user == null) return Session::flash('error_is_visble', 'Is Visible  not found');

        $user->profile()->update([
            'user_id' => $user->id,
            'is_visible' => $request->is_visible ? '1' : '0',
        ]);

        Session::flash('success_is_visble', 'Is Visible updated successfully');

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

        Session::flash('success_certi', 'Certificate added successfully!');

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

