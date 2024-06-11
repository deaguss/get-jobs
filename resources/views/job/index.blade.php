@extends('layouts.main')

@section('title', $job->title)

@include('partials.header')

@section('content')
<div class="bg-white font-inter text-gray-900">
    <div class="max-w-4xl mx-auto p-8">
        <img src="{{ $job->company->logo ? asset('storage/company/logo/' . $job->company->logo) : 'https://placehold.co/100x50' }}"
            alt="Company logo" class="mb-6 w-40 max-w-40">
        <h1 class="text-2xl font-semibold mb-2">{{ $job->title }}</h1>
        <h2 class="text-lg text-gray-600 mb-4">{{ $job->company->name }}
            <a href="{{ route('home.company.explore.detail', $job->company->id) }}"
                class="text-blue-600 hover:underline-offset-2 hover:underline">See
                company</a>
        </h2>
        <div class="space-y-2 mb-4">
            <div class="flex items-center text-gray-600">
                <i class="fas fa-map-marker-alt mr-2"></i>
                <span>{{ $job->company->location }}</span>
            </div>
            <div class="flex items-center text-gray-600">
                <i class="fas fa-clock mr-2"></i>
                <span>{{ $job->type }}</span>
            </div>
            <div class="flex items-center text-gray-600">
                <i class="fas fa-money-bill-wave mr-2"></i>
                <span>{{'$ ' . $job->salary }}</span>
            </div>
            <div class="text-gray-600">{{ $job->created_at->diffForHumans() }}</div>
        </div>
        <div class="flex gap-x-4 mb-6">
            <div>
                <a href="{{ route('home.apply.jobs', $job->id) }}"
                    class="bg-pink-500 text-white hover:bg-pink-600 py-2 px-4 rounded-md">Apply</a>
            </div>
            <form action="/{{ $job->id }}/saved-jobs" method="POST" class="-mt-2">
                @csrf
                <button
                    class="{{ $job->isSaved ? 'bg-blue-100 text-blue-600' : 'bg-blue-500 text-blue-100'}} py-2 px-4 rounded-md">{{
                    $job->isSaved ? 'Unsaved' : 'Save'
                    }}</button>
            </form>
        </div>
        <div>
            <h1 class="font-semibold mb-2">Description job</h1>
            <p class="mb-6">
                @php
                $descriptionParts = preg_split('/[:.]/', $job->description);
                @endphp

                @foreach ($descriptionParts as $part)
                <span>{{ trim($part) }}</span><br><br>
                @endforeach
            </p>
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