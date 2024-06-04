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
    <div id="dropdownNavbar" class="hiddenn w-full px-32 font-normal">
        <ul aria-labelledby="dropdownLargeButton" class="flex gap-x-2">
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
        <p class="pt-2 font-thin text-justify text-gray-900 mr-[40rem]">promotion of job seekers on the homepage of the
            website.
            Each registered job
            seeker has the opportunity to be
            promoted, so that their profile appears more frequently and more prominently among other job seekers.</p>
        <div class="card_people">
        </div>
    </div>
    <div class="wrapper ms-20 my-5">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
            <li class="card">
                <div class="bg-white border border-slate-300 p-5 rounded-lg">
                    <div class="flex justify-center">
                        <img class="w-24 h-24 mb-3 rounded-full object-cover"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk 1</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed
                        natus eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="bg-white border border-slate-300 p-5 rounded-lg">
                    <div class="flex justify-center">
                        <img class="w-24 h-24 mb-3 rounded-full object-cover"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk 2</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed
                        natus eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="bg-white border border-slate-300 p-5 rounded-lg">
                    <div class="flex justify-center">
                        <img class="w-24 h-24 mb-3 rounded-full object-cover"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk 3</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed
                        natus eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="bg-white border border-slate-300 p-5 rounded-lg">
                    <div class="flex justify-center">
                        <img class="w-24 h-24 mb-3 rounded-full object-cover"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk 4</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed
                        natus eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="bg-white border border-slate-300 p-5 rounded-lg">
                    <div class="flex justify-center">
                        <img class="w-24 h-24 mb-3 rounded-full object-cover"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk 5</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed
                        natus eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                    </div>
                </div>
            </li>
            <li class="card">
                <div class="bg-white border border-slate-300 p-5 rounded-lg">
                    <div class="flex justify-center">
                        <img class="w-24 h-24 mb-3 rounded-full object-cover"
                            src="https://plus.unsplash.com/premium_photo-1682146151884-40fe6fcc284f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8"
                            alt="Bonnie image" draggable="false" />
                    </div>
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 ">Jro Datuk 6</h5>
                    <p class="mb-2">Skill</p>
                    <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed
                        natus eaque.</p>
                    <div class="flex text-white gap-x-3">
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                        <p class="px-2 border rounded-md bg-slate-600 border-slate-400">Skill</p>
                    </div>
                </div>
            </li>

        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
</div>

{{-- Find a job --}}
<div>
    <div class="px mt-16 promotion_people">
        <h1 class="text-2xl font-semibold">Find a job</h1>
        <p class="pt-2 font-thin text-justify text-gray-900 mr-[40rem]">find jobs that are relevant to your desires.
            just apply and wait for a reply.</p>

        <div class="grid grid-cols-3 gap-4">
            {{-- Card --}}
            @for($i = 0; $i < 6; $i++) <div
                class="flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h5 class="block text-2xl antialiased leading-snug tracking-normal text-blue-600 font-bold">
                            Junior Coler
                        </h5>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z" />
                        </svg>
                    </div>
                    <p class="mb-3">
                        Pt. name
                    </p>
                    <p>
                        Location
                    </p>
                    <p class="block font-sans text-base antialiased font-light leading-relaxed text-justify">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus blanditiis nobis eaque facilis.
                        Voluptas illo, a rerum exercitationem omnis, quos eaque non alias nostrum praesentium recusandae
                        ratione repellat laborum sequi.
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <button
                        class="align-middle select-none font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                        type="button">
                        Apply now
                    </button>
                </div>
        </div>
        @endfor
    </div>
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
