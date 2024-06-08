@extends('layouts.main')

@section('title', 'Registration company')

@include('partials.header')

@section('content')

<div class="flex justify-center my-10 items-center custom-regis-job">
    <div class="w-full max-w-2xl bg-white rounded-xl p-8 shadow-lg items-center custom-regis-job-transform">
        <h1 class="font-bold text-4xl pb-3 text-center uppercase">Job Registration Form</h1>
        <form action="">
            <div class="mb-4">
                <label for="job-title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="job-title" id="job-title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Job title">
            </div>
            <div class="mb-4">
                <label for="job-description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="job-description" id="job-description"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md" rows="8"
                    placeholder="Job description"></textarea>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                <input type="text" name="location" id="location"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Enter location">
            </div>
            <div class="mb-4">
                <label for="salary" class="block text-gray-700 font-bold mb-2">Salary</label>
                <input type="number" name="salary" id="salary"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Enter salary">
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700 font-bold mb-2">Salary</label>
                <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="">Full-time</option>
                    <option value="">Part-time</option>
                </select>
            </div>
            <button type="submit"
                class="w-full my-4 bg-blue-500 text-white font-bold py-2 px-4 rounded-md">Submit</button>

        </form>
    </div>
</div>

@include("partials.footer")
@endsection