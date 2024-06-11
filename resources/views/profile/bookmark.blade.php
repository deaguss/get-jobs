@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')
<div class="my-10">
    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200" id="default-tab"
        data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button id="save-tab" data-tabs-target="#save" type="button" role="tab" aria-controls="save"
                aria-selected="false"
                class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 active">Save</button>
        </li>
    </ul>
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