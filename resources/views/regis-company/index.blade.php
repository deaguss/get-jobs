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
                    <form action="#">
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <input type="text" placeholder="Company Name*"
                                class="border border-gray-400 py-1 px-2 rounded-md" />
                            <input type="text" placeholder="Owner*"
                                class="border border-gray-400 py-1 px-2 rounded-md" />
                        </div>
                        <div class="mb-3">
                            <h1 class="text-3lg font-medium mb-2">Company Mailing Address<span
                                    class="text-red-600">*</span></h1>
                            <input type="text" placeholder="Street Address"
                                class="border border-gray-400 py-1 px-2 rounded-md w-full" />
                        </div>
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <input type="text" placeholder="City" class="border border-gray-400 py-1 px-2 rounded-md" />
                            <input type="text" placeholder="State"
                                class="border border-gray-400 py-1 px-2 rounded-md" />
                            <input type="text" placeholder="Zip Code"
                                class="border border-gray-400 py-1 px-2 rounded-md" />
                            <div>
                                <div class="border border-gray-400 py-1 px-2 rounded-md flex items-center duration-300 cursor-pointer"
                                    onclick="dropdownCountry()">
                                    <div class="flex justify-between w-full items-center">
                                        <span class="text-[15px] text-gray-400">Country</span>
                                        <span class="text-sm rotate-180" id="arrow">
                                            <i class="bi bi-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-left text-sm font-normal w-80 mt-2 absolute mx-auto bg-white"
                                    id="submenu">
                                    <h1
                                        class="cursor-pointer p-2 rounded-md mt-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Indonesia</h1>
                                    <h1
                                        class="cursor-pointer p-2 rounded-md mt-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Spain</h1>
                                    <h1
                                        class="cursor-pointer p-2 rounded-md mt-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Malaysia Kontoll</h1>
                                </div>
                            </div>
                            <input type="email" placeholder="Email*"
                                class="border border-gray-400 py-1 px-2 rounded-md mt-4" />
                            <input type="number" placeholder="Phone Number*"
                                class="border border-gray-400 py-1 px-2 rounded-md mt-4" />
                            <input type="text" placeholder="Nominal Capital"
                                class="border border-gray-400 py-1 px-2 rounded-md" />
                            <input type="text" placeholder="Industry*"
                                class="border border-gray-400 py-1 px-2 rounded-md" />
                        </div>
                        <div>
                            <input type="text" placeholder="Website"
                                class="border border-gray-400 py-1 px-2 rounded-md w-full mb-3" />
                            <textarea placeholder="Company Description"
                                class="border border-gray-400 py-1 px-2 rounded-md w-full mb-5"></textarea>

                            <button
                                class="w-full bg-blue-400 p-5 rounded-md text-3lg font-bold text-[20px] text-white">Register
                                Company</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function dropdownCountry() {
    document.querySelector("#submenu").classList.toggle("hidden");
    document.querySelector("#arrow").classList.toggle("rotate-0");
  }
  dropdownCountry();
</script>
</div>

@include("partials.footer")
@endsection