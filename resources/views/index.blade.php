@extends('layouts.main')

@section('title', 'Get jobs')

@include('partials.header')

@section('content')

{{-- FORM Jobs Title Search --}}
<div class="w-full px-4 py-6 rounded header_search bg-gradient-to-r from-rose-700 to-pink-600">
    <form class="max-w-full h-fit md:flex md:gap-x-4 md:items-end">
        <div class="flex-grow mb-5 md:mb-0">
            <label for="jobs-title" class="block mb-1 text-xl font-bold text-white">Jobs Title</label>
            <input type="text" id="jobs-title"
                class="block w-full p-4 text-base text-gray-900 border-none rounded-lg outline-none bg-gray-50 focus:ring-offset-2 focus:ring-4"
                placeholder="Enter keyword">
        </div>
        <div class="flex-grow mb-5 md:mb-0">
            <label for="location" class="block mb-1 text-xl font-bold text-white">Where</label>
            <input type="text" id="location"
                class="block w-full p-4 text-base text-gray-900 border-none rounded-lg outline-none bg-gray-50 focus:ring-offset-2 focus:ring-4"
                placeholder="Enter country, state...">
        </div>
        <button type="submit"
            class="w-full px-8 py-4 text-base font-bold text-center text-white bg-blue-800 rounded-lg md:w-auto md:mt-auto hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-primary-300">Search</button>
    </form>
</div>


{{-- Recent Search --}}
<div class="mt-5 recent_search">
    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
        class="flex items-center justify-between w-full px-3 py-4 text-2xl font-semibold text-gray-900 md:border-0 md:p-0 md:w-auto">Recent
        search
        <svg class="w-3.5 h-3.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <div id="dropdownNavbar" class="hidden w-full px-5 font-normal divide-y">
        <ul aria-labelledby="dropdownLargeButton">
            <li class="py-1.5">
                <span id="badge-dismiss-red"
                    class="inline-flex items-center px-2 py-1 text-sm font-medium text-red-800 bg-red-100 rounded me-2 dark:bg-red-900 dark:text-red-300">
                    IT Support
                    <button type="button"
                        class="inline-flex items-center p-1 text-sm text-red-400 bg-transparent rounded-sm ms-2 hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-800 dark:hover:text-red-300"
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


{{-- Slider --}}
<div>
    <div class="px-3 mt-20 promotion_people">
        <h1 class="text-2xl font-semibold">Promotion people</h1>
        <p class="pt-2 font-thin text-justify text-gray-900">promotion of job seekers on the homepage of the website.
            Each registered job
            seeker has the opportunity to be
            promoted, so that their profile appears more frequently and more prominently among other job seekers.</p>
        <div class="card_people">
        </div>
    </div>


    {{-- LIST SLIDER --}}
    <hr class="mt-8">

    {{-- Slider pertama --}}
    {{-- <div class="container py-2 mx-auto">
        <div class="overflow-x-auto">
            <div class="inline-flex space-x-4">
                @for($i = 0; $i < 6; $i++) \ <div
                    class="flex-shrink-0 max-w-sm p-6 text-center bg-white border border-gray-200 rounded-lg shadow w-80">
                    <div class="flex justify-center">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed natus
                        eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                    </div>
            </div>

            @endfor
        </div>
    </div> --}}

    {{-- Slider kedua --}}
    <div>
        <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
            <div class="relative h-80 md:h-96 overflow-hidden rounded-lg">
                <!-- Item -->
                @for($i = 0; $i < 6; $i++) <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    {{-- <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt=""> --}}
                    <div
                        class="absolute block max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 border border-slate-300 p-5 rounded-lg">
                        <div class="flex justify-center">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                                alt="Bonnie image" />
                        </div>
                        <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk</h5>
                        <p class="mb-2">Skill</p>
                        <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                            amet
                            consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed natus
                            eaque.</p>
                        <div class="flex text-white gap-x-3">
                            <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                            <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                            <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        </div>
                    </div>
            </div>
            @endfor
        </div>

        {{-- Slider Button --}}
        <div class="flex justify-center items-center mb-5 gap-x-5">
            <button type="button"
                class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>


</div>

<hr class="mb-32">
</div>





</div>


@include("partials.footer")
@endsection
