@extends('layouts.main')

@section('title', 'Get jobs')

@include('partials.header')

@section('content')

{{-- FORM Jobs Title Search --}}
<div class="w-full px-4 py-16 rounded header_search bg-gradient-to-r from-rose-700 to-pink-600">
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
    <div id="dropdownNavbar" class="hidden w-full px-2 font-normal">
        <ul aria-labelledby="dropdownLargeButton" class="flex gap-x-2 w-fit">
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
            @for ($i = 1; $i < 7; $i++) <li class="card">
                <div class="bg-white border border-slate-300 px-10 py-3 rounded-lg">
                    <div class="relative flex justify-center items-center h-24 mt-3">
                        <img class="w-24 h-24 mb-3 rounded-full object-cover transition-all duration-300 ease-in-out hover:absolute hover:top-0 hover:w-full hover:h-full hover:rounded-3xl hover:ease-in"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 pt-3">Jro Datuk {{ $i }}</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed
                        natus eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <span class="bg-rose-100 text-pink-500 px-1.5 py-1 rounded">
                            <p class="text-xs font-medium">Node
                                js</p>
                        </span>
                        <span class="bg-rose-100 text-pink-500 px-1.5 py-1 rounded">
                            <p class="text-xs font-medium">PHP</p>
                        </span>
                        <span class="bg-rose-100 text-pink-500 px-1.5 py-1 rounded">
                            <p class="text-xs font-medium">Laravel</p>
                        </span>
                    </div>
                    <button type="button"
                        class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-pink-300 mt-4 mb-2">
                        <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                        Contact </button>
                </div>
                </li>
                @endfor
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
            <a href="{{ $jobs->id }}/job"
                class="mx-auto mt-10 p-6 w-96 max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">
                <div class="flex items-start justify-between">
                    <img src="{{ $jobs->company->logo ? asset('storage/company/logo/' . $jobs->company->logo) : 'https://placehold.co/100x50' }}"
                        alt="logo" class="w-16 max-w-16">
                    <form action="/{{ $jobs->id }}/saved-jobs" method="POST">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-bookmark text-pink-300 hover:text-pink-600 text-xl"></i>
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
        <button type="button" onclick="window.location.href='/detail-company'""
            class=" text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4
            focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-10
            mt-5 ms-5">See
            more &rarr;</button>
    </div>
</div>


<script>
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
        if(!wrapper.matches(":hover")) autoPlay();
    }


    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
</script>
@include("partials.footer")
@endsection