@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')
<div class="bg-white font-inter text-gray-900">
    <div class="max-w-4xl mx-auto p-8">
        <img src="https://placehold.co/150x50" alt="Company logo" class="mb-6">
        <h1 class="text-2xl font-semibold mb-2">Back-End Developer</h1>
        <h2 class="text-lg text-gray-600 mb-4">PT Mirah Global Investment <a href="#" class="text-blue-600">View all
                jobs</a></h2>
        <div class="space-y-2 mb-4">
            <div class="flex items-center text-gray-600">
                <i class="fas fa-map-marker-alt mr-2"></i>
                <span>Bali</span>
            </div>
            <div class="flex items-center text-gray-600">
                <i class="fas fa-briefcase mr-2"></i>
                <span>Developers/Programmers (Information & Communication Technology)</span>
            </div>
            <div class="flex items-center text-gray-600">
                <i class="fas fa-clock mr-2"></i>
                <span>Full time</span>
            </div>
            <div class="flex items-center text-gray-600">
                <i class="fas fa-money-bill-wave mr-2"></i>
                <span>Rp 9.000.000 – Rp 13.500.000 per month</span>
            </div>
            <div class="text-gray-600">Posted 12d ago</div>
        </div>
        <div class="flex space-x-4 mb-6">
            <button class="bg-pink-500 text-white py-2 px-4 rounded-md">Quick apply</button>
            <button class="bg-blue-100 text-blue-600 py-2 px-4 rounded-md">Unsave</button>
        </div>
        <p class="mb-6">
            We are seeking a talented and experienced Back-End Developer to join our dynamic team. The ideal candidate
            will have a strong background in database management, and server-side logic. You will play a crucial role in
            developing and maintaining the back-end components of our platform, ensuring high performance and
            responsiveness to front-end requests.
        </p>
        <h3 class="font-semibold mb-2">Responsibilities:</h3>
        <ul class="list-disc list-inside space-y-1">
            <li>Develop and maintain server-side logic, ensuring high performance and responsiveness</li>
            <li>Integrate user-facing elements developed by front-end developers with server-side logic</li>
            <li>Implement security and data protection measures</li>
        </ul>
    </div>
</div>
@include("partials.footer")
@endsection