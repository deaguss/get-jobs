@extends('layouts.main')

@section('title', 'Forget Password - Get jobs')

@include("partials.header")

@section('content')
<section>
    <div class="flex flex-col items-center justify-center px-8 py-10 mx-auto md:h-screen lg:py-0">
        <div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow">
            <header class="mb-8">
                <h1 class="text-2xl font-bold mb-1">Forget Password</h1>
                <p class="text-[15px] text-slate-500 mx-5">
                    enter your email and we will send a message to your email to reset your password.
                </p>
            </header>
            <form id="otp-form" action="/forget-password" method="POST">
                @csrf

                <div class="flex justify-center items-center flex-col mb-5">
                    <input type="email" name="email" id="email" placeholder="user@gmail.com"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-72 p-2.5"
                        required>
                </div>
                <div class="max-w-[260px] mx-auto mt-4">
                    <button type="submit"
                        class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-indigo-500 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include("components.simple-alert", ['errors' => $errors] + (isset($success) ? ['success' => $success] : []))

@include("partials.footer")
@endsection