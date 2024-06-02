@extends('layouts.main')

@section('title', 'Verify Otp - Get jobs')

@include("partials.header")

@section('content')
<section>
    <div class="flex flex-col items-center justify-center px-8 py-10 mx-auto md:h-screen lg:py-0">
        <div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow">
            <header class="mb-8">
                <h1 class="text-2xl font-bold mb-1">Verification your Account</h1>
                <p class="text-[15px] text-slate-500">Enter the 4-digit verification code that was sent to your email.
                </p>
            </header>
            <form id="otp-form" action="/sign-up/verify-otp/{{ $id }}" method="POST">
                @csrf
                <div class="flex items-center justify-center gap-3">
                    <input type="text"
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-gray-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        name="otp[]" maxlength="1" />
                    <input type="text"
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-gray-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        name="otp[]" maxlength="1" />
                    <input type="text"
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-gray-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        name="otp[]" maxlength="1" />
                    <input type="text"
                        class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-gray-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                        name="otp[]" maxlength="1" />
                </div>
                <div class="max-w-[260px] mx-auto mt-4">
                    <button type="submit"
                        class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-indigo-500 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm shadow-indigo-950/10 hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150">Verify
                        Account</button>
                </div>
            </form>
            <form action="{{ route('signup.resend.otp', ['id' => $id]) }}" method="POST">
                @csrf
                <div class="text-sm text-slate-500 mt-4">Didn't receive code? <button type="submit"
                        class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">Resend</button>
                </div>
            </form>

        </div>
    </div>
</section>
@include("components.simple-alert", ['errors' => $errors] + (isset($success) ? ['success' => $success] : []))

@include("partials.footer")
@endsection