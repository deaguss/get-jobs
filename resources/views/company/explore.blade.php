@extends('layouts.main')

@section('title', 'Get jobs - Explore')

@include('partials.header')

@section('content')
<div
    class="bg-gradient-to-r from-rose-700 to-pink-600 text-white rounded-md py-7 px-3 lg:flex justify-between items-center">
    <div class="lg:w-[60%] lg:pl-5">
        <h1 class="text-3xl font-semibold md:text-4xl lg:text-7xl">Find the right company for you</h1>
        <p class="pt-5 text-xl">Everything you need to know about a company, all in one place</p>

        <form action="" class="pt-5" method="GET">
            <input type="text" class="w-full px-3 py-4 rounded-md text-black" placeholder="Search company..."
                name="search" onchange="this.form.submit">
        </form>
    </div>
    <div class="hidden lg:block lg:w-[40%]">
        <img src="{{ asset('img/jobs.svg') }}" alt="resume" width="300">
    </div>
</div>

<div class="mt-8 mb-32">
    <h1 class="text-3xl font-semibold">Explore companies</h1>
    <p class="mt-3 text-xl">Learn about new jobs, reviews, company culture, perks and benefits.</p>


    @if (!empty($searchCompany))
    <button type="button" onclick="window.location.href='/company/explore'" class=" text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4
    focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-10
    mt-5">&larr; Back </button>
    <div class="flex flex-wrap">
        @foreach ($searchCompany as $company)
        <a href="{{ route('home.company.explore.detail', $company->id) }}"
            class="mx-auto mt-5 p-6 w-[21rem] max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">
            <div class="">
                <img src="{{ $company->logo ? asset('storage/company/logo/' . $company->logo) : 'https://placehold.co/150x50?text=Logo' }}"
                    alt="Logo" class="w-24 h-16 max-w-24 max-h-16 mb-2 object-cover">
                <h1 class="text-[1.56rem] font-semibold">{{ $company->name }}</h1>
                <p class="mt-2 mb-2 text-gray-700">{{ $company->location }}</p>
                <p class="my-0.5 text-pink-500 bg-pink-300 rounded-lg py-0.5 px-1.5 inline text-xs font-semibold">
                    {{ $company->jobAdvertisements->count() }}</p>
                <p class="mt-1 text-gray-500 text-sm">{{ $company->created_at->diffForHumans() }}</p>
            </div>
        </a>
        @endforeach
    </div>
    @else
    <div>
        <div class="wrapper mx-auto my-10">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel h-fit mx-4">
                @foreach ($companies as $company)
                <li class="card gap-x-12">
                    <a href="{{ route('home.company.explore.detail', $company->id) }}"
                        class="mx-auto mt-5 p-6 w-[21rem] max-w-96 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-indigo-600">
                        <div class="">
                            <img src="{{ $company->logo ? asset('storage/company/logo/' . $company->logo) : 'https://placehold.co/150x50?text=Logo' }}"
                                alt="Logo" class="w-26 h-10 max-w-26 max-h-10 mb-2 object-cover">
                            <h1 class="text-[1.56rem] font-semibold">{{ $company->name }}</h1>
                            <p class="mt-2 mb-2 text-gray-700">{{ $company->location }}</p>
                            <p
                                class="my-0.5 text-pink-500 bg-pink-300 rounded-lg py-0.5 px-1.5 inline text-xs font-semibold">
                                {{ $company->jobAdvertisements->count() }}</p>
                            <p class="mt-1 text-gray-500 text-sm">{{ $company->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
    </div>
    @endif
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

@if ($errors->any())
@foreach ($errors->all() as $error)
@include('components.alert', ['type' => 'error', 'message' => $error])
@endforeach
@endif

@if (session('success'))
@include('components.alert', ['type' => 'success', 'message' => session('success')])
@endif

@endsection