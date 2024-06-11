@extends('layouts.main')

@section('title', $company->name)

@include('partials.header')

@section('content')
<div class="mx-auto py-20 px-5">
    <div class="flex items-center justify-between">
        <img src="{{ $company->logo ? asset('storage/company/logo/' . $company->logo) : 'https://placehold.co/100x50' }}"
            alt="logo" class="w-32 max-w-32">
    </div>
    <div class="mt-6">
        <h1 class="text-2xl font-bold">{{ $company->name }}</h1>
    </div>
    <div class="mt-6">
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="about-tab" data-tabs-target="#about"
                        type="button" role="tab" aria-controls="about" aria-selected="false">About</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                        id="jobs-tab" data-tabs-target="#jobs" type="button" role="tab" aria-controls="jobs"
                        aria-selected="false">Jobs</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50" id="about" role="tabpanel" aria-labelledby="about-tab">
                <div class="mt-5">
                    <h2 class="text-xl font-semibold">Company overview</h2>
                    <div class="mt-4">
                        <div class="flex">
                            <div class="w-1/4 text-gray-600">Website</div>
                            <div class="w-3/4">
                                <a href="{{ $company->website }}" class="text-gray-700 underline underline-offset-2">{{
                                    $company->name
                                    }}
                                    <i class="fas fa-external-link-alt text-sm ps-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <div class="w-1/4 text-gray-600">Location</div>
                            <div class="w-3/4">{{ $company->location }}</div>
                        </div>
                        <div class="flex mt-2">
                            <div class="w-1/4 text-gray-600">Resgister at</div>
                            <div class="w-3/4">{{ $company->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="text-gray-700">
                        {{ $company->description }}
                    </p>
                </div>
            </div>
            <div class="hidden rounded-lg" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
                <div class="text-gray-900 font-sans flex flex-col gap-x-4 pr-[70%]">
                    <h1>Find a job at a <strong>{{ $company->name }}</strong> company</h1>
                    @foreach ($company->jobAdvertisements as $jobs)
                    <a href="{{ route('home.detail.jobs', $jobs->id) }}"
                        class="mx-auto mt-10 p-6 w-96 max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">
                        <div class="flex items-start justify-between">
                            <img src="{{ $company->logo ? asset('storage/company/logo/' . $company->logo) : 'https://placehold.co/100x50' }}"
                                alt="logo" class="w-16 max-w-16">
                            @php
                            $isActive = false;
                            foreach ($savedJobByUsers as $saved) {
                            if ($saved->job_advertisement_id === $jobs->id) {
                            $isActive = true;
                            break;
                            }
                            }
                            @endphp
                            <form action="/{{ $jobs->id }}/saved-jobs" method="POST">
                                @csrf
                                <button type="submit">
                                    <i
                                        class="fa fa-bookmark {{ $isActive ? 'text-pink-600' : 'text-pink-300 hover:text-pink-600' }} text-xl"></i>

                                </button>
                            </form>
                        </div>
                        <div class="mt-4">
                            <h2 class="text-lg font-semibold">{{ $jobs->title }}</h2>
                            <p class="text-gray-700">{{ $company->name }}</p>
                            <p class="mt-2 text-gray-700">{{ $jobs->location }}</p>
                            <p class="mt-1 text-gray-700">{{ $jobs->type }}</p>
                            <p class="mt-2 text-indigo-700 font-semibold">${{ $jobs->salary }}</p>
                            <p class="mt-2 text-gray-500 text-sm">{{ $jobs->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-full max-w-7xl">
    @include("partials.footer")
</div>
@endsection