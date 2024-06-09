<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\JobAdvertisementRequest;
use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobAdvertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public $companyDir = 'public/company';

    public function index(){
        $user = Auth::user();

        if (!$user->company) {
            Session::flash('error_company', 'You need to register a company first.');
            return redirect()->route('home.company.form');
        }

        return view('company.index', ['user' => $user]);
    }

    public function register(){
        return view('company.create');
    }

    public function addCompany(CompanyRequest $request)
    {
        $user = Auth::user();

        if ($user->company) {
            Session::flash('error_company', 'You have already registered a company.');
            return redirect()->back();
        }

        $company = Company::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'website' => $request->website,
            'location' => $request->location,
        ]);

        if (!$company) {
            Session::flash('error_company', 'Failed to register company.');
            return redirect()->back();
        }

        Session::flash('success_company', 'Company registered successfully!');

        return redirect()->route('home.company.index');
    }

    public function updateCompany(CompanyRequest $request)
    {
        $user = Auth::user();

        if (!$user->company) {
            Session::flash('error_company', 'Company not found.');
            return redirect()->back();
        }

        $logoFile = $request->file('logo');
        if ($logoFile) {
            $logoName = time() . '.' . $logoFile->getClientOriginalName();
            $storagePath = $this->companyDir . '/logo';
            $logoFile->storeAs($storagePath, $logoName);
        }

        if ($user->company->logo != null) {
            Storage::delete($this->companyDir . '/logo' . '/' . $user->company->logo);
        }

        $company = $user->company->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logoName,
            'website' => $request->website,
            'location' => $request->location,
        ]);

        if (!$company) {
            Session::flash('error_company', 'Failed to update company.');
            return redirect()->back();
        }

        Session::flash('success_company', 'Company updated successfully!');

        return redirect()->route('home.company.index');
    }

    public function addJobAdvertisement(JobAdvertisementRequest $request)
    {
        $user = Auth::user();

        if (!$user->company) {
            Session::flash('error_job', 'You need to register a company first.');
            return redirect()->back();
        }

        $jobAdvertisement = JobAdvertisement::create([
            'company_id' => $user->company->id,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'location' => $request->location,
            'salary' => $request->salary,
        ]);

        if (!$jobAdvertisement) {
            Session::flash('error_job', 'Failed to add job advertisement.');
            return redirect()->back();
        }

        Session::flash('success_job', 'Job advertisement added successfully!');

        return redirect()->back();
    }

    public function applyJob(ApplicationRequest $request)
    {
        $user = Auth::user();

        $jobs = Job::where('job_advertisement_id', $request->input('job_advertisement_id'))->get();

        if (!$user) {
            Session::flash('error', 'You need to login first.');
            return redirect()->back();
        }



        $application = new Application();
        $application->fill($request->validated());
        $application->user_id = $user->id;

        if (!$application->save()) {
            Session::flash('error', 'Failed to submit application.');
            return redirect()->back();
        }

        $job = Job::create([
            'user_id' => $user->id,
            'job_advertisement_id' => $jobs->job_advertisement_id,
            'status' => 'applied',
        ]);

        if (!$job) {
            $application->delete();
            Session::flash('error', 'Failed to submit application.');
            return redirect()->back();
        }

        $job->applications()->attach($application->id);

        Session::flash('success', 'Application submitted successfully!');

        return redirect()->back();
    }
}
