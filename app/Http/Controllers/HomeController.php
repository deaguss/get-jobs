<?php

namespace App\Http\Controllers;

use App\Models\JobAdvertisement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allJobs = $this->allJobs();

        // dd($allJobs);

        return view('index', ['allJobs' => $allJobs]);
    }


    public function detailJob($id = null)
    {
        return view('job.index', ['id' => $id]);
    }

    public function allJobs(){
        return JobAdvertisement::with('company')->limit(3)->get();
    }


}
