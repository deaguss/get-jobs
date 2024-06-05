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
            <li class="me-2 ">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="true" class="inline-block p-4 text-yellow-600 rounded-lg hover:bg-gray-100 ">
                    Apllied Jobs
                </button>
            </li>

            <li class="me-2">
                <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services"
                    aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jobs
                    Available</button>
            </li>

        </ul>

        <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                aria-labelledby="about-tab">
                <div>
                    {{-- CONTENT --}}
                </div>
            </div>

            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel"
                aria-labelledby="services-tab">
                <div>
                    {{-- CONTENT --}}
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