<?php

namespace App\Http\Controllers;

use App\Models\JobAdvertisement;
use App\Models\SavedJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allJobs = $this->allJobs();
        $savedJobByUsers = $this->savedJobByUsers();

        return view('index', [
            'allJobs' => $allJobs,
            'savedJobByUsers' => $savedJobByUsers
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


}
