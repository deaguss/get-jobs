@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')
<div class="my-10">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200" id="default-tab"
        data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button id="apply-tab" data-tabs-target="#apply" type="button" role="tab" aria-controls="apply"
                aria-selected="false"
                class="inline-block p-4 text-blue-600 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 active">Applied</button>
        </li>
        <li class="me-2" role="presentation">
            <button id="save-tab" data-tabs-target="#save" type="button" role="tab" aria-controls="save"
                aria-selected="false"
                class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50">Save</button>
        </li>
    </ul>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 " id="apply" role="tabpanel" aria-labelledby="apply-tab">
            <div class="w-full flex flex-row gap-x-5">
                {{-- Card scroll --}}
                <div class="flex flex-col gap-y-3 h-[44rem] overflow-y-auto w-[40%] p-2">
                    @for($i = 0; $i < 9; $i++) {{-- CARD --}} <div class="border border-slate-400 rounded-lg w-fit">
                        <div class="flex p-2 gap-x-4 ">
                            <div class="flex justify-center items-center bg-slate-400 rounded-lg w-32">
                                <p class="text-center p-2">Company image</p>
                            </div>
                            <div class="flex flex-col gap-y-2">
                                <div class="flex items-center gap-x-12">
                                    <h1 class="text-xl font-bold">Web Developer Intern</h1>
                                    <p class="text-blue-600 font-bold text-sm">Already applied</p>
                                </div>
                                <p class="text-base">PT. Jro Datuk Gaming</p>
                                <p class="text-base text-opacity-90">Atlantis</p>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            {{-- End Card scroll --}}


            {{-- CARD Content --}}
            <div class="w-[60%]">
                <div class="w-full bg-blue-500 rounded-xl h-32 text-white flex justify-center items-center">
                    <h1 class="text-3xl font-bold">Wait for a reply.....</h1>
                </div>
                <div class="px-5 pt-5">
                    <h1 class="text-2xl font-bold">Activity information</h1>

                    <div class="pt-10">
                        <h1 class="text-lg font-semibold text-blue-500">Company name</h1>
                        <h1 class="text-xl font-semibold">Web Developer Intern</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A aut beatae voluptatum molestiae
                            et hic,
                            veniam eveniet fuga quaerat id?</p>
                        <button class="border bg-slate-500 text-slate-50 rounded-md mt-2 p-2">Send Email</button>
                    </div>
                </div>
            </div>
            {{-- End CARD Content --}}
        </div>

    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50" id="save" role="tabpanel" aria-labelledby="save-tab">
        <div class="flex flex-col h-[44rem] overflow-y-auto w-[40%] p-1">
            @foreach ($savedJobs as $jobs)
            <a href="{{ route('home.detail.jobs', $jobs->id) }}"
                class="mx-auto mt-5 p-6 w-96 max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">
                <div class="flex items-start justify-between">
                    <img src="{{ $jobs->company->logo ? asset('storage/company/logo/' . $jobs->company->logo) : 'https://placehold.co/100x50' }}"
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
                    <p class="text-gray-700">{{ $jobs->company->name }}</p>
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
@include("partials.footer")
@endsection