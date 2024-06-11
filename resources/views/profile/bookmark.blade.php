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
                class="inline-block p-4 text-indigo-600 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 active">Applied</button>
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
                <div class="scroll-container flex flex-col gap-y-3 h-[44rem] overflow-y-auto w-[40%] p-2 text-gray-700">
                    @for($i = 0; $i < 9; $i++) <div
                        class="border-gray-600/50 rounded-lg w-fit hover:cursor-pointer border hover:border-indigo-400">
                        <div class="flex p-2 gap-x-4 ">
                            <img src="https://placehold.co/150x50?text=Logo" alt="Logo"
                                class="w-24 h-20 max-w-24 max-h-20 mb-2 object-cover">
                            <div class="flex flex-col gap-y-1">
                                <div class="flex items-center gap-x-12">
                                    <h1 class="text-lg font-semibold">Web Developer Intern</h1>
                                    <p
                                        class="text-indigo-500 font-semibold text-xs bg-indigo-300 py-0.5 px-1.5 rounded-lg">
                                        Applied</p>
                                </div>
                                <p class="text-xs mt-3">PT. Jro Datuk Gaming</p>
                                <p class="text-xs text-opacity-90">
                                    <i class="fas fa-map-marker-alt mr-2">
                                    </i>Atlantis
                                </p>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            {{-- End Card scroll --}}


            {{-- CARD Content --}}
            <div class="w-[60%]">
                <div class="w-full bg-indigo-500 rounded-xl h-32 text-white flex justify-center items-start flex-col">
                    <h1 class="text-lg font-semibold px-16">Your application has been sent to <a href="#"
                            class="underline underline-offset-2">pt sosro
                            company</a> email.
                    </h1>
                    <p class="px-16">please wait for a response from the company.</p>
                </div>
                <div class="px-5 pt-5">
                    <h1 class="text-2xl font-semibold">Activity information</h1>
                    <div class="pt-10">
                        <img src="https://placehold.co/150x50?text=Logo" alt="Logo"
                            class="w-24 h-20 max-w-24 max-h-20 mb-2 object-cover">
                        <h1 class="text-base font-semibold text-indigo-500">Company name</h1>
                        <h1 class="text-lg font-semibold">Web Developer Intern</h1>
                        <p class="text-opacity-60 text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A
                            aut
                            beatae voluptatum
                            molestiae
                            et hic,
                            veniam eveniet fuga quaerat id?</p>
                        <button class="border bg-indigo-500 text-slate-50 rounded-md mt-2 p-2">See company</button>
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

@if ($errors->any())
@foreach ($errors->all() as $error)
@include('components.alert', ['type' => 'error', 'message' => $error])
@endforeach
@endif

@if (session('success'))
@include('components.alert', ['type' => 'success', 'message' => session('success')])
@endif

@include("partials.footer")
@endsection