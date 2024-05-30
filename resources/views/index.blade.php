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
<div class="recent_search">

</div>
@endsection

@include("partials.footer")