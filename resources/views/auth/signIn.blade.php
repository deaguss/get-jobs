@extends('layouts.main')

@section('title', 'Sign in - Get Jobs')

@include("partials.header")

@section('content')
<section>
    <div class="flex flex-col items-center justify-center px-8 py-10 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold text-gray-900 md:text-2xl leading-none">
                    LOGIN
                </h1>
                <h5 class="text-sm text-gray-700 text-muted pb-2 leading-none">
                    login to your account right now!
                </h5>
                <form class="space-y-4 md:space-y-6" action="/sign-in" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                            placeholder="user@gmail.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                            required="">
                    </div>
                    <a href="{{ route(('signin.forget.password.form')) }}"
                        class="font-medium text-sm text-indigo-600 hover:underline">Forget
                        password?</a>
                    <button type="submit"
                        class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
                    <p class="text-sm font-light text-gray-500">
                        don't have an account? <a href="{{ route('signup.form') }}"
                            class="font-medium text-indigo-600 hover:underline ">Create an account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
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