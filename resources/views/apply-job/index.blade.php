@extends('layouts.main')

@section('title', 'Registration company')

@include('partials.header')

@section('content')
{{-- CARD --}}
<div class="w-full flex flex-row gap-x-5">
    {{-- Card scroll --}}
    <div class="flex flex-col gap-y-3 h-[44rem] overflow-y-auto w-[40%] p-2">
        @for($i = 0; $i < 9; $i++) {{-- CARD --}} <div class="border border-slate-400 rounded-lg w-fit">
            <div class="flex p-2 gap-x-4 ">
                <div class="flex justify-center items-center bg-slate-400 rounded-lg w-32">
                    <p class="text-center p-2">Company image</p>
                </div>
                <div class="flex flex-col gap-y-2">
                    <div class="flex items-center gap-x-12">
                        <h1 class="text-xl font-bold">Web Developer Intern</h1>
                        <p class="text-blue-600 font-bold text-sm">Already applied</p>
                    </div>
                    <p class="text-base">PT. Jro Datuk Gaming</p>
                    <p class="text-base text-opacity-90">Atlantis</p>
                </div>
            </div>
    </div>
    @endfor
</div>
{{-- End Card scroll --}}


{{-- CARD Content --}}
<div class="w-[60%]">
    <div class="w-full bg-blue-500 rounded-xl h-32 text-white flex justify-center items-center">
        <h1 class="text-3xl font-bold">Wait for a reply.....</h1>
    </div>
    <div class="px-5 pt-5">
        <h1 class="text-2xl font-bold">Activity information</h1>

        <div class="pt-10">
            <h1 class="text-lg font-semibold text-blue-500">Company name</h1>
            <h1 class="text-xl font-semibold">Web Developer Intern</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A aut beatae voluptatum molestiae et hic,
                veniam eveniet fuga quaerat id?</p>
            <button class="border bg-slate-500 text-slate-50 rounded-md mt-2 p-2">Send Email</button>
        </div>
    </div>
</div>
{{-- End CARD Content --}}
</div>




@include("partials.footer")
@endsection