@extends('layouts.main')

@section('title', 'Get jobs')

@include('partials.header')

@section('content')
<div
    class="bg-gradient-to-r from-rose-700 to-pink-600 text-white rounded-md py-7 px-3 lg:flex justify-between items-center">
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

<div class="mt-8">
    <h1 class="text-3xl font-semibold">Explore companies</h1>
    <p class="mt-3 text-xl">Learn about new jobs, reviews, company culture, perks and benefits.</p>


    <div>
        <div class="wrapper mx-auto my-10">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel h-fit mx-4">
                @for ($i = 1; $i < 7; $i++) <li class="card gap-x-12">
                    {{-- <div class="flex-shrink-0 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow w-80">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Company name</h5>
                        </a>
                        <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit
                            amet
                            consectetur adipisicing elit. Sed, dolores. Fugiat cum, earum vitae quis ad sequi sed natus
                            eaque.
                        </p>
                        <a href="/detail-company"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 rounded-lg focus:ring-4 focus:outline-none focus:ring-pink-600">
                            See Jobs
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div> --}}

                    <a href=""
                        class="mx-auto mt-5 p-6 w-[21rem] max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">

                        <div class="">
                            <h1 class="text-[1.56rem] font-semibold">Jobs Title</h1>
                            <p class="text-gray-700">Company name</p>
                            <p class="mt-2 text-gray-700">Location</p>
                            <p class="mt-1 text-gray-700">Full-time</p>
                            <p class="mt-2 text-indigo-700 font-semibold">$1000</p>
                            <p class="mt-2 text-gray-500 text-sm">Posted 2 days ago</p>
                        </div>
                    </a>
                    </li>
                    @endfor
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
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