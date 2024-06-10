<?php

namespace App\Http\Controllers;

use App\Models\JobAdvertisement;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $allJobs = $this->allJobs();
        $savedJobByUsers = $this->savedJobByUsers();
        $allUsers = $this->allUsers();
        $searchJobs = $this->searchJobs($request);

        // if($searchJobs){
        //     dd($searchJobs);
        // }

        return view('index', [
            'allJobs' => $allJobs,
            'savedJobByUsers' => $savedJobByUsers,
            'allUsers' => $allUsers,
            'searchJobs' => $searchJobs
        ]);
    }


    public function detailJob($id = null)
    {
        $job = JobAdvertisement::with('company')->findOrFail($id);

        $savedJobByUser = $this->savedJobByUsers();

        foreach ($savedJobByUser as $saved) {
            if ($saved->job_advertisement_id === $job->id) {
                $job->isSaved = true;
                break;
            }
        }

        return view('job.index', [
            'job' => $job
        ]);
    }


    public function applyJob($id = null)
    {
        $job = JobAdvertisement::with('company')->findOrFail($id);
        return view('job.apply', [
            'job' => $job
        ]);
    }

    public function allJobs(){
        return JobAdvertisement::with('company')->limit(3)->get();
    }

    public function savedJobByUsers()
    {
        return SavedJob::
        where('user_id', auth()->user()->id)->get();
    }

    public function allUsers()
    {
        return User::with('profile')->get();
    }

    public function searchJobs($request)
    {

        $title = $request->input('title');
        $location = $request->input('location');

        return JobAdvertisement::with('company')
            ->where('title', 'like', '%' . $title . '%')
            ->when($location,
             function ($query) use ($location) {
                return $query->where('location', 'like', '%' . $location . '%');
            })
            ->get();
    }
}
