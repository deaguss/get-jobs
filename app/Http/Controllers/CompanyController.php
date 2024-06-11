<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\JobAdvertisementRequest;
use App\Mail\CompanyJobMail;
use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobAdvertisement;
use App\Models\SavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public $companyDir = 'public/company';

    public function index(){
        $user = Auth::user();

        if (!$user->company) {
            Session::flash('errors', 'You need to register a company first.');
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
            Session::flash('errors', 'You have already registered a company.');
            return redirect()->back();
        }

        $company = Company::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'website' => $request->website,
            'email' => $request->email,
            'location' => $request->location,
        ]);

        if (!$company) {
            Session::flash('errors', 'Failed to register company.');
            return redirect()->back();
        }

        Session::flash('success', 'Company registered successfully!');

        return redirect()->route('home.company.index');
    }

    public function updateCompany(CompanyRequest $request)
    {
        $user = Auth::user();

        if (!$user->company) {
            Session::flash('errors', 'Company not found.');
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
            Session::flash('errors', 'Failed to update company.');
            return redirect()->back();
        }

        Session::flash('success', 'Company updated successfully!');

        return redirect()->route('home.company.index');
    }

    public function addJobAdvertisement(JobAdvertisementRequest $request)
    {
        // dd($request->all());
        $user = Auth::user();

        if (!$user->company) {
            Session::flash('errors', 'You need to register a company first.');
            return redirect()->back();
        }

        $jobAdvertisement = JobAdvertisement::create([
            'admin_id' => $user->id,
            'company_id' => $user->company->id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'type' => $request->type,
        ]);

        if (!$jobAdvertisement) {
            Session::flash('errors', 'Failed to add job advertisement.');
            return redirect()->back();
        }

        Session::flash('success', 'Job advertisement added successfully!');

        return redirect()->back();
    }

    public function deleteJobAdvertisement($id = null)
    {
        $user = Auth::user();

        if (!$user->company) {
            Session::flash('errors', 'You need to register a company first.');
            return redirect()->back();
        }

        if (!$id) {
            Session::flash('errors', 'Job advertisement not found.');
            return redirect()->back();
        }

        $jobAdvertisement = $user->company->jobAdvertisements()
        ->findOrFail($id)->delete();

        if (!$jobAdvertisement) {
            Session::flash('errors', 'Failed to delete job advertisement.');
            return redirect()->back();
        }

        Session::flash('success', 'Job advertisement deleted successfully!');

        return redirect()->back();
    }

    public function saveJobAdvertisement($id = null) {
        $job = JobAdvertisement::find($id);

        if (!$job) {
            Session::flash('errors', 'Job not found.');
            return redirect()->back();
        }

        $user = Auth::user();

        $findSavedJob = SavedJob::where('user_id', $user->id)
                                ->where('job_advertisement_id', $job->id)
                                ->first();

        if ($findSavedJob) {
            $findSavedJob->delete();

            Session::flash('success', 'Unsaved the job.');
        } else {
            $savedJob = SavedJob::create([
                'user_id' => $user->id,
                'job_advertisement_id' => $job->id,
            ]);
            if (!$savedJob) {
                Session::flash('errors', 'Failed to save job advertisement.');
                return redirect()->back();
            }
            Session::flash('success', 'Job saved successfully!');
        }

        return redirect()->back();
    }


    public function applySend(ApplicationRequest $request, $id = null)
    {
        $user = Auth::user();

        if (!$user) {
            Session::flash('errors', 'You need to login first.');
            return redirect()->back();
        }

        $jobs = JobAdvertisement::find($id);

        if (!$jobs) {
            Session::flash('errors', 'Job not found.');
            return redirect()->back();
        }

        if ($user->id === $jobs->admin_id) {
            Session::flash('errors', 'You cannot apply for your own job.');
            return redirect()->back();
        }

        $company = Company::find($jobs->company_id);

        if (!$company) {
            Session::flash('errors', 'Company not found.');
            return redirect()->back();
        }

        $coverLetterPath = null;
        $coverLetterFile = $request->file('cover_letter');
        if ($coverLetterFile) {
            $coverLetterName = 'cover_letter' . '-' . time() . '.' . $coverLetterFile->getClientOriginalExtension();

            $storagePath = $this->companyDir . '/cover_letter';
            $coverLetterPath = $coverLetterFile
            ->storeAs($storagePath, $coverLetterName);
        }

        $job = Job::create([
            'job_advertisement_id' => $jobs->id,
            'user_id' => $user->id,
            'cover_letter' => $coverLetterPath,
            'status' => 'pending',
        ]);

        $application = Application::create([
            'job_id' => $job->id,
            'user_id' => $user->id,
            'cover_letter' => $coverLetterPath,
            'status' => 'pending',
        ]);

        // dd($job, $application, $coverLetterPath, $company);
        // exit();

        if (!$application) {
            Session::flash('errors', 'Failed to submit application.');
            return redirect()->back();
        }

        $isSent = Mail::to($company->email)->send(new CompanyJobMail(
            $user,
            $coverLetterPath,
            $company
        ));

        // dd($isSent);
        // exit();

        if($isSent) {
            $job->update([
                'status' => 'accepted',
            ]);
            Session::flash('success', 'Application submitted successfully!');
            return redirect()->back();
        }

        // $jobApplication = $job->applications()->attach($application->id);

        // if (!$jobApplication) {
        //     $job->update([
        //         'status' => 'rejected',
        //     ]);
        //     Session::flash('errors', 'Failed to associate application with the job.');
        //     return redirect()->back();
        // }

        Session::flash('success', 'Application submitted successfully!');
        return redirect()->back();
    }

    public function explore(Request $request)
    {
        $searchCompany = null;

        if(isset($request->search)) {
            $searchCompany = $this->searchCompany($request->search);
        }

        $companies = Company::with('jobAdvertisements')->get();

        return view('company.explore',
        [
            'companies' => $companies,
            'searchCompany' => $searchCompany
        ]);
    }

    public function detail($id = null) {
        $savedJobByUsers = $this->savedJobByUsers();
        $company = Company::with('jobAdvertisements')->findOrFail($id);

        return view('company.detail', [
            'company' => $company,
            'savedJobByUsers' => $savedJobByUsers
        ]);
    }

    public function savedJobByUsers()
    {
        return SavedJob::
        where('user_id', auth()->user()->id)->get();
    }

    public function searchCompany($company = null)
    {
        return Company::where('name', 'like', '%' . $company . '%')->get();
    }
}
