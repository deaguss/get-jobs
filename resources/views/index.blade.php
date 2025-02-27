@extends('layouts.main')

@section('title', 'Get jobs - Dashboard')

@include('partials.header')

@section('content')

{{-- FORM Jobs Title Search --}}
<div class="w-full px-4 py-16 rounded header_search bg-gradient-to-r from-rose-700 to-pink-600">
    <form action="" class="max-w-full h-fit md:flex md:gap-x-4 md:items-end" method="GET">
        <div class="flex-grow mb-5 md:mb-0">
            <label for="jobs-title" class="block mb-1 text-xl font-bold text-white">Jobs Title</label>
            <input type="text" id="jobs-title"
                class="block w-full p-4 text-base text-gray-900 border-none rounded-lg outline-none bg-gray-50 focus:ring-offset-2 focus:ring-4"
                name="title" placeholder="Enter keyword">
        </div>
        <div class="flex-grow mb-5 md:mb-0">
            <label for="location" class="block mb-1 text-xl font-bold text-white">Where</label>
            <input type="text" id="location"
                class="block w-full p-4 text-base text-gray-900 border-none rounded-lg outline-none bg-gray-50 focus:ring-offset-2 focus:ring-4"
                name="location" placeholder="Enter country, state...">
        </div>
        <button type="submit"
            class="w-full px-8 py-4 text-base font-bold text-center text-white bg-indigo-600 rounded-lg md:w-auto md:mt-auto hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300">Search</button>
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
    <div id="dropdownNavbar" class="w-full px-36 font-normal">
        <ul id="searchHistoryList" aria-labelledby="dropdownLargeButton" class="flex gap-x-2 w-fit">
            {{-- history --}}
        </ul>
    </div>
</div>


@if (!empty($searchJobs))
<div>
    <div class="px mt-16 promotion_people mb-10">
        <h1 class="text-2xl font-semibold">Find a job</h1>
        <p class="pt-2 font-light text-justify text-gray-900 mr-[40rem]">find jobs that are relevant to your desires.
            just apply and wait for a reply.</p>
        <button type="button" onclick="window.location.href='/'" class=" text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4
            focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-10
            mt-5">&larr; Back </button>
        <div class="grid grid-cols-3">
            {{-- Card --}}
            @foreach ($searchJobs as $jobs)
            <a href="{{ $jobs->id }}/job"
                class="mx-auto mt-10 p-6 w-96 max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">
                <div class="flex items-start justify-between">
                    <img src="{{ $jobs->company->logo ? asset('storage/company/logo/' . $jobs->company->logo) : 'https://placehold.co/100x50' }}"
                        alt="logo" class="w-16 max-w-16">
                    @php
                    $isActive = false;
                    if (!is_null($savedJobByUsers) && (is_array($savedJobByUsers) || is_object($savedJobByUsers))) {
                    foreach ($savedJobByUsers as $saved) {
                    if (!is_null($saved) && isset($saved->job_advertisement_id) && $saved->job_advertisement_id ===
                    $jobs->id) {
                    $isActive = true;
                    break;
                    }
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
@else
{{-- Slider --}}
<div>
    <div class="px mt-16 promotion_people">
        <h1 class="text-2xl font-semibold">Promotion people</h1>
        <p class="pt-2 font-light text-justify text-gray-900">promotion of job seekers on the homepage of the
            website. Each registered job seeker has the opportunity to be
            promoted, so that their profile appears more frequently and more prominently among other job seekers.</p>
        <div class="card_people">
        </div>
    </div>
    <div class="wrapper mx-auto my-10">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel h-fit">
            @if (!empty($allUsers))
            @foreach ($allUsers as $users)
            <li class="card">
                <div class="bg-white border border-slate-300 px-10 py-3 rounded-lg">
                    <div class="relative flex justify-center items-center h-24 mt-3">
                        <img class="w-24 h-24 max- mb-3 rounded-full object-cover transition-all duration-300 ease-in-out hover:absolute hover:top-0 hover:w-full hover:h-full hover:rounded-3xl hover:ease-in"
                            src="{{ $users->avatar ? asset('storage/avatars/'. $users->avatar) : 'https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8' }}"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 pt-3">{{ isset($users->first_name,
                        $users->last_name) && $users->first_name !== null && $users->last_name !== null ?
                        $users->first_name . ' ' . $users->last_name : 'John Doe' }}</h5>
                    <p class="mb-2 font-extralight text-sm">{{ $users->profile->recent_education ?? 'Suite 564 17055
                        Adriane Knoll, Breitenbergshire, MO 83592-4816' }}</p>
                    @php
                    $personalSummary = $users->profile->personal_summmary ?? null;

                    $summaryArray = $personalSummary ? explode('.', $personalSummary) : ['In today meeting, the team
                    discussed the progress of the ongoing project, highlighting significant milestones achieved in the
                    past week.'];

                    $firstPart = isset($summaryArray[0]) ? $summaryArray[0] : '';
                    @endphp

                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">{{ $firstPart }}</p>

                    <div class="flex text-white gap-x-1 gap-y-2 flex-wrap">
                        @if (!empty($users->profile->skills))
                        @php
                        $skills = explode(',', $users->profile->skills);
                        @endphp
                        @foreach ($skills as $skill)
                        <span class="bg-rose-100 text-pink-500 px-1.5 py-1 rounded">
                            <p class="text-xs font-medium">{{ $skill }}</p>
                        </span>
                        @endforeach
                        @else
                        <span class="bg-rose-100 text-pink-500 px-1.5 py-1 rounded">
                            <p class="text-xs font-medium">None</p>
                        </span>
                        @endif

                    </div>
                    <a href="mailto:{{ $users->email }}"
                        class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-pink-300 mt-4 mb-2">
                        <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                        Contact </a>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
</div>

{{-- Find a job --}}
<div>
    <div class="px mt-16 promotion_people">
        <h1 class="text-2xl font-semibold">Find a job</h1>
        <p class="pt-2 font-light text-justify text-gray-900 mr-[40rem]">find jobs that are relevant to your desires.
            just apply and wait for a reply.</p>

        <div class="grid grid-cols-3">
            {{-- Card --}}
            @foreach ($allJobs as $jobs)
            <a href="{{ route('home.detail.jobs', $jobs->id) }}"
                class="mx-auto mt-10 p-6 w-96 max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">
                <div class="flex items-start justify-between">
                    <img src="{{ $jobs->company->logo ? asset('storage/company/logo/' . $jobs->company->logo) : 'https://placehold.co/100x50' }}"
                        alt="logo" class="w-16 max-w-16">
                    @php
                    $isActive = false;
                    if (!is_null($savedJobByUsers) && (is_array($savedJobByUsers) || is_object($savedJobByUsers))) {
                    foreach ($savedJobByUsers as $saved) {
                    if (!is_null($saved) && isset($saved->job_advertisement_id) && $saved->job_advertisement_id ===
                    $jobs->id) {
                    $isActive = true;
                    break;
                    }
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
        <button type="button" onclick="window.location.href='/company/explore'" class=" text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4
            focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-10
            mt-5 ms-5">See
            more &rarr;</button>
    </div>
</div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
            const searchQuery = @json($searchQuery);

            let searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];

            if (searchQuery.title || searchQuery.location) {
                searchHistory.push(searchQuery);
                localStorage.setItem('searchHistory', JSON.stringify(searchHistory));
            }

            // console.log('Search History:', searchHistory);

            const searchHistoryList = document.getElementById('searchHistoryList');
            searchHistory.forEach((query, index) => {
                const listItem = document.createElement('li');
                listItem.className = 'py-1.5';
                listItem.innerHTML = `
                    <span id="badge-dismiss-${index}" class="inline-flex items-center px-2 py-1 text-sm font-medium text-red-800 bg-red-100 rounded me-2 dark:bg-red-900 dark:text-red-300">
                        ${query.title || ''} ${query.location || ''}
                        <button type="button" class="inline-flex items-center p-1 text-sm text-red-400 bg-transparent rounded-sm ms-2 hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-800 dark:hover:text-red-300" data-dismiss-target="#badge-dismiss-${index}" aria-label="Remove">
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Remove badge</span>
                        </button>
                    </span>
                `;
                searchHistoryList.appendChild(listItem);
            });

            const lastSearch = searchHistory.length ? searchHistory[searchHistory.length - 1] : null;
            if (lastSearch) {
                if (lastSearch.title) {
                    document.getElementById('title').value = lastSearch.title;
                }
                if (lastSearch.location) {
                    document.getElementById('location').value = lastSearch.location;
                }
            }
        });

    const wrapper = document.querySelector(".wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper i");
    const carouselChildrens = [...carousel.children];

    let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

    carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });

    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");

    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
    });

    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");

        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    }

    const dragging = (e) => {
        if(!isDragging) return;

        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }

    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    }

    const infiniteScroll = () => {

        if(carousel.scrollLeft === 0) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
            carousel.classList.remove("no-transition");
        }

        else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }
        clearTimeout(timeoutId);
        if(!wrapper.matches(":hover"));
    }


    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
</script>
@include("partials.footer")

@if ($errors->any())
@foreach ($errors->all() as $error)
@include('components.alert', ['type' => 'error', 'message' => $error])
@endforeach
@endif

@if (session('success'))
@include('components.alert', ['type' => 'success', 'message' => session('success')])
@endif

@endsection