@extends('layouts.main')

@section('title', 'Get jobs')

@include("partials.header")

@section('content')
<div class="header_search bg-gradient-to-r from-rose-700 to-pink-600 w-full py-6 rounded px-4">
    <form class="max-w-sm mx-auto md:flex md:gap-x-10">
        <div class="mb-5">
            <label for="large-input" class="block mb-1 text-xl font-bold text-white">Jobs Title</label>
            <input type="text" id="large-input"
                class="block w-full p-4 text-gray-900 rounded-lg bg-gray-50 text-base focus:ring-offset-2 focus:ring-4 outline-none border-none"
                placeholder="Enter keyword">
        </div>
        <div class="mb-5">
            <label for="large-input" class="block mb-1 text-xl font-bold text-white">Where</label>
            <input type="text" id="large-input"
                class="block w-full p-4 text-gray-900 rounded-lg bg-gray-50 text-base focus:ring-offset-2 focus:ring-4 outline-none border-none"
                placeholder="Enter country, state...">
        </div>
        <button type="submit"
            class="w-full text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-bold rounded-lg text-base px-5 py-3.5 text-center">Search</button>
    </form>
</div>
<div class="recent_search mt-5">
    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
        class="flex items-center text-2xl font-semibold justify-between w-full py-4 px-3 text-gray-900 md:border-0 md:p-0 md:w-auto">Recent
        search
        <svg class="w-3.5 h-3.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <div id="dropdownNavbar" class="hidden w-full font-normal divide-y px-5">
        <ul aria-labelledby="dropdownLargeButton">
            <li class="py-1.5">
                <span id="badge-dismiss-red"
                    class="inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-300">
                    IT Support
                    <button type="button"
                        class="inline-flex items-center p-1  ms-2 text-sm text-red-400 bg-transparent rounded-sm hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-800 dark:hover:text-red-300"
                        data-dismiss-target="#badge-dismiss-red" aria-label="Remove">
                        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Remove badge</span>
                    </button>
                </span>
            </li>

        </ul>
    </div>
</div>
<div class="promotion_people mt-20 px-3">
    <h1 class="font-semibold text-2xl">Promotion people</h1>
    <p class="font-thin text-gray-900">promotion of job seekers on the homepage of the website. Each registered job
        seeker has the opportunity to be
        promoted, so that their profile appears more frequently and more prominently among other job seekers.</p>
    <div class="card_people">
    </div>
</div>

@include("partials.footer")
@endsection