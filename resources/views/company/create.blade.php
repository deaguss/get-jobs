@extends('layouts.main')

@section('title', 'Registration company')

@include('partials.header')

@section('content')

<div style="padding: 0 !important;" class="register">
    <div class="min-h-screen py-40">
        <div class="container mx-auto">
            <div class="w-6/12 bg-white rounded-xl mx-auto overflow-hidden shadow-2xl">
                <div class="py-10 px-12">
                    <h1 class="text-3xl mb-3 font-semibold text-center">Company Registration Form</h1>
                    <p class="text-center mb-8">Register your business by using this form. Required fields are marked
                        with an asterisk (<span class="text-red-600">*</span>).</p>
                    <form action="/company/register" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <input type="text" placeholder="Company Name*"
                                class="border border-gray-400 py-1 px-2 rounded-md" name="name" />
                        </div>
                        <div class="mb-3">
                            <h1 class="text-3lg font-medium mb-2">Company Mailing Address<span
                                    class="text-red-600">*</span></h1>
                            <input type="text" placeholder="Street Address"
                                class="border border-gray-400 py-1 px-2 rounded-md w-full" name="location" />
                        </div>
                        <div>
                            <input type="text" placeholder="Website"
                                class="border border-gray-400 py-1 px-2 rounded-md w-full mb-3" name="website" />
                            <textarea placeholder="Company Description"
                                class="border border-gray-400 py-1 px-2 rounded-md w-full mb-5" name="description"
                                rows="8"></textarea>

                            <button type="submit"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-4 text-center w-full text-xl">Register
                                Company</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@if ($errors->any())
@foreach ($errors->all() as $error)
@include('components.alert', ['type' => 'error', 'message' => $error])
@endforeach
@endif

@if (session('success'))
@include('components.alert', ['type' => 'success', 'message' => session('success')])
@endif

@include("partials.footer")
@endsection