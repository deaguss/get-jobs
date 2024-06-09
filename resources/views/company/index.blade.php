@extends('layouts.main')

@section('title', $user->company->name)

@include('partials.header')

@section('content')
<div class="mx-auto py-20 px-5">
    <div class="flex items-center justify-between">
        <img src="{{ $user->company->logo ? asset('storage/company/logo/' . $user->company->logo) : 'https://placehold.co/100x50' }}"
            alt="Nusantara Sakti Group logo" class="w-32 max-w-32">
        <div class="flex gap-x-2">
            <button type="button" data-modal-target="default-modal-company" data-modal-toggle="default-modal-company"
                class="bg-pink-600 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                <i class="fas fa-pen mr-2"></i>
                Edit Company
            </button>
            <button type="button" data-modal-target="default-modal-job" data-modal-toggle="default-modal-job"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                <i class="fas fa-pen mr-2"></i>
                Add job
            </button>
        </div>
    </div>
    <div id="default-modal-company" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit {{ $user->company->name }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="default-modal-company">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <form action="/company/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-4 md:p-5 space-y-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Company
                                Name*</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                value="{{ $user->company->name }}" placeholder="Company name*">
                        </div>
                        <div>
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900">location*</label>
                            <input type="text" name="location" id="location"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                value="{{ $user->company->location }}" placeholder="Location">
                        </div>
                        <div>
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Website
                                url*</label>
                            <input type="text" name="website" id="website"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                value="{{ $user->company->website }}" placeholder="https:://">
                        </div>
                        <textarea name="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full"
                            rows="8" placeholder="Write abour your company">{{$user->company->description }}</textarea>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                Logo Company</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                aria-describedby="file_input_help" id="file_input" type="file" name="logo"
                                value="{{ $user->company->logo }}">
                            <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPEG, JPG
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button data-modal-hide="default-modal-company" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Change</button>
                        <button data-modal-hide="default-modal-company" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                    </div>
                </form>
            </div>
        </div>
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
                                <a href="{{ $user->company->website }}"
                                    class="text-gray-700 underline underline-offset-2">{{ $user->company->name
                                    }}
                                    <i class="fas fa-external-link-alt text-sm ps-1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <div class="w-1/4 text-gray-600">Location</div>
                            <div class="w-3/4">{{ $user->company->location }}</div>
                        </div>
                        <div class="flex mt-2">
                            <div class="w-1/4 text-gray-600">Resgister at</div>
                            <div class="w-3/4">{{ $user->company->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <p class="text-gray-700">
                        {{ $user->company->description }}
                    </p>
                </div>
            </div>
            <div class="hidden rounded-lg" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
                <div class="text-gray-900 font-sans flex justify-start items-start mx-auto">
                    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-start justify-between">
                            <img src="{{ $user->company->logo ? asset('storage/company/logo/' . $user->company->logo) : 'https://placehold.co/100x50' }}"
                                alt="Intersys Optima Nusantara logo" class="w-16 max-w-16">
                            <i class="far fa-bookmark text-gray-400 text-xl"></i>
                        </div>
                        <div class="mt-4">
                            <h2 class="text-lg font-semibold">Web Developer</h2>
                            <p class="text-gray-700">PT Intersys Optima Nusantara</p>
                            <p class="mt-2 text-gray-700">North Jakarta, Jakarta</p>
                            <p class="mt-1 text-gray-700">Developers/Programmers</p>
                            <p class="text-gray-700">(Information & Communication Technology)</p>
                            <p class="mt-4 text-gray-500 text-sm">1d ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-full max-w-7xl">
    @include("partials.footer")
</div>
@endsection