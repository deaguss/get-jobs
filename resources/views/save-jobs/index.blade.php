@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')


{{-- Section Profile --}}
<section class="p-2">
    {{-- Tabs --}}
    <div class="w-full mt-10 bg-white border border-gray-200 rounded-lg">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border border-gray-200 rounded-t-lg bg-gray-50"
            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="me-2 border-b">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="true" class="inline-block p-4 text-blue-600 rounded-lg hover:bg-gray-100 ">
                    Jobs Apllied
                </button>
            </li>

            <li class="me-2">
                <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services"
                    aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100">Jobs
                    Saved</button>
            </li>

        </ul>

        <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8" id="about" role="tabpanel" aria-labelledby="about-tab">
                @for($i = 0; $i < 4; $i++) <div
                    class="flex flex-col w-full mt-6 text-gray-700 bg-white shadow-md bg-clip-border border-2 rounded-xl">
                    <div class="p-6">
                        <div class="flex justify-between items-center">
                            <h5
                                class="block text-4xl antialiased leading-snug tracking-normal text-blue-600 font-bold underline underline-offset-4">
                                Junior Coler
                            </h5>
                            <svg class="w-10 h-10 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                            </svg>
                        </div>
                        <p class="mb-3 text-xl">
                            Pt. name
                        </p>
                        <p class="text-xl">
                            Location
                        </p>
                        <p class="text-xl">
                            1.000.000 - Unlimited
                        </p>
                        <p class="block font-sans text-xl antialiased font-light text-justify leading-none">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus blanditiis nobis eaque
                            facilis.
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <button disabled
                            class="align-middle select-none font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
                            Status check
                        </button>
                    </div>
            </div>
            @endfor
        </div>

        <div class="hidden p-4 bg-white rounded-lg md:p-8" id="services" role="tabpanel" aria-labelledby="services-tab">
            <div>
                @for($i = 0; $i < 4; $i++) <div
                    class="flex flex-col w-full mt-6 text-gray-700 bg-white shadow-md bg-clip-border border-2 rounded-xl">
                    <div class="p-6">
                        <div class="flex justify-between items-center">
                            <h5
                                class="block text-4xl antialiased leading-snug tracking-normal text-blue-600 font-bold underline underline-offset-4">
                                Junior Coler
                            </h5>
                            <svg class="w-10 h-10 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                            </svg>
                        </div>
                        <p class="mb-3 text-xl">
                            Pt. name
                        </p>
                        <p class="text-xl">
                            Location
                        </p>
                        <p class="text-xl">
                            1.000.000 - Unlimited
                        </p>
                        <p class="block font-sans text-xl antialiased font-light text-justify leading-none">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus blanditiis nobis eaque
                            facilis.
                        </p>
                    </div>
                    <div class="p-6 pt-0 mb-5">
                        <a href=""
                            class="align-middle select-none font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none">
                            Apply now
                        </a>
                    </div>
            </div>
            @endfor
        </div>
    </div>
    </div>
    </div>
</section>

{{-- --}}




<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add('hidden');
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove('active');
        }
        evt.currentTarget.classList.add('active');
        document.getElementById(tabName).classList.remove('hidden');
    }
</script>

@include("partials.footer")
@endsection