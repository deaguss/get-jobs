@extends('layouts.main')

@section('title', 'Apply')

@include('partials.header')

@section('content')
<div>
    <main class="max-w-4xl mx-auto mt-8 px-4">
        <h1 class="text-2xl font-bold mb-2">Applying for</h1>
        <h2 class="text-xl text-gray-700 mb-4">{{ $job->title }}</h2>
        <section class="bg-indigo-900  text-white p-6 rounded-lg mb-8 relative">
            <div class="absolute top-0 right-0 w-1/4 h-full bg-pink-600 rounded-r-lg"></div>
            <div class="relative flex gap-x-4 items-center">
                <img src="{{ auth()->user()->avatar ?
                 asset('storage/avatars/' . auth()->user()->avatar)
                : 'https://via.placeholder.com/100' }}" alt="Avatar"
                    class="text-center w-24 max-w-24 h-24 max-h-24 rounded-full object-cover -mt-8">
                <div class="">
                    <h3 class="text-xl font-semibold mb-6">{{ auth()->user()->first_name . ' ' .
                        auth()->user()->last_name}}</h3>
                    <p class="mb-2"><i class="fas fa-phone"></i> {{ auth()->user()->phone }}</p>
                    <p class="mb-4"><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                    <a href="{{ route('home.profile.index') }}"
                        class="bg-gray-200 text-blue-900 px-4 py-2 rounded">Edit</a>
                </div>
            </div>
        </section>
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Resume</h3>
            <div class="space-y-4">
                <div class="ml-8 flex items-center space-x-4">
                    <input type="text" value="{{ auth()->user()->profile->resume }}"
                        class="bg-gray-200 border border-gray-300 rounded px-4 py-2 w-64" readonly />
                    <a href="{{ asset('storage/resume/'. auth()->user()->profile->resume) }}" class="text-gray-400"><i
                            class="fas fa-download"></i></a>
                </div>
            </div>
        </section>
        <form action="">
            <section class="mb-8">
                <h3 class="text-xl font-semibold mb-4">Cover letter</h3>
                <div class="space-y-4">

                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                        resume</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        id="file_input" type="file" name="resume">

                </div>
            </section>
            <div class="text-right mb-16">
                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Continue <i
                        class="fas fa-arrow-right"></i></button>
            </div>
        </form>
    </main>

</div>

@include("partials.footer")
@endsection