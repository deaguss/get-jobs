@extends('layouts.main')

@section('title', 'Get jobs')

@include('partials.header')

@section('content')
<div class="bg-[#051A49] text-white rounded-md py-7 px-3 lg:flex justify-between items-center">
    <div class="lg:w-[60%] lg:pl-5">
        <h1 class="text-3xl font-semibold md:text-4xl lg:text-7xl">Find the right company for you</h1>
        <p class="pt-5 text-xl">Everything you need to know about a company, all in one place</p>

        <form action="" class="pt-5">
            <input type="text" class="w-full px-3 py-2 rounded-md" placeholder="Search by company name">
        </form>
    </div>
    <div class="hidden lg:block lg:w-[40%]">
        <img src="{{ asset('img/jobs.svg') }}" alt="resume" width="300">
    </div>
</div>

<div>
    <h1 class="mt-5 text-3xl font-semibold">Explore companies</h1>
    <p class="mt-3 text-xl">Learn about new jobs, reviews, company culture, perks and benefits.</p>


    {{--
        Ada dua tipe buat nampilin perusahaan
        Yang pertama pake carousel, yang kedua tak bikin list slide
        Yang carousel tak komen dulu, sekarang pake list dulu.
        Pilih dah yang mana mau tak pake
        --}}

    {{-- CAROUSEL --}}
    {{-- <div id="default-carousel" class="relative w-full mt-6 border border-black rounded-lg" data-carousel="slide">
        <div class="relative h-32 overflow-hidden rounded-lg md:h-96">
            @for($i = 0; $i < 4; $i++)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <div class="absolute block w-full text-center -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <h5 class="text-xl font-semibold">Company name</h5>
                    <p class="text-sm">Company description</p>
                    <p>5 Jobs available</p>
                </div>
            </div>
            @endfor
        </div>

        <!-- Tombol Slide -->
        <button type="button" class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-black dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-black dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div> --}}


    {{-- LIST --}}
    <hr class="mt-8">
    <div class="container py-2 mx-auto">
        <div class="overflow-x-auto">
            <div class="inline-flex space-x-4">
                @for($i = 0; $i < 6; $i++)
                <div class="flex-shrink-0 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow w-80">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Company name</h5>
                    </a>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed natus eaque.</p>
                    <a href="/detail-company" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#051A49] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                        See Jobs
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
                @endfor
            </div>
        </div>
    </div>
    <hr class="mb-28">


</div>
@include("partials.footer")

@endsection

