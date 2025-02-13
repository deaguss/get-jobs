@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')
<div class="container flex p-4 gap-x-5 w-full">
    <div class="bg-white rounded-lg">
        <div class="flex items-center space-x-4 bg-gradient-to-r from-rose-700 to-pink-600 py-8 px-3 rounded-xl">
            <form action="/profile/update-avatar" enctype="multipart/form-data" method="POST">
                @csrf
                @method("PUT")
                <label for="file-upload" class="hover-edit-image relative cursor-pointer block rounded-full">
                    <img src="{{ $datas->avatar ? asset('storage/avatars/' . $datas->avatar) : 'https://via.placeholder.com/100' }}"
                        alt="Avatar" class="text-center w-40 h-40 rounded-full object-cover">
                </label>
                <input id="file-upload" type="file" name="avatar" class="hidden" onchange="this.form.submit()">
            </form>
            <div>
                <h1 class="text-3xl font-bold text-gray-200">{{ $datas->first_name && $datas->last_name
                    ? ($datas->first_name . ' ' . $datas->last_name)
                    : 'User_' . $datas->short_id }}</h1>
                <p class="text-gray-200 flex items-center gap-x-2 leading-none mt-4">
                    <svg class="w-5 h-5 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                    </svg>
                    {{ $datas->email ? $datas->email : 'unknow@gmail.com' }}
                </p>
                <span
                    class="inline-flex items-center {{ $datas->profile->avaliable ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}  text-xs font-medium px-2 py-0.5 rounded-full mt-1 ">
                    <span
                        class="w-1.5 h-1.5 me-1 {{ $datas->profile->avaliable ? 'bg-green-500' : 'bg-red-500'}}  rounded-full"></span>
                    {{ $datas->profile->avaliable ? 'Avaliable' : 'Unavaliable' }}
                </span>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                    class="text-gray-200 bg-transparent hover:bg-gray-100/20 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 flex mt-4">
                    Edit
                </button>

                <!-- Modal set data user -->
                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-3xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Edit information
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <form action="/profile/update" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="flex mx-auto gap-x-4 w-full">
                                        <div class="flex flex-col w-full">
                                            <label for="first_name"
                                                class="block mb-2 text-sm font-medium text-gray-900">First
                                                name</label>
                                            <input type="text" name="first_name" id="first_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-auto p-2.5"
                                                value="{{ $datas->first_name }}" placeholder="Enter first name">
                                        </div>
                                        <div class="flex flex-col w-full">
                                            <label for="last_name"
                                                class="block mb-2 text-sm font-medium text-gray-900">Last
                                                name</label>
                                            <input type="text" name="last_name" id="last_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-auto p-2.5"
                                                value="{{ $datas->last_name }}" placeholder="Enter last name">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="address"
                                            class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                                        <input type="text" name="address" id="address"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                            value="{{ $datas->address }}" placeholder="full address">
                                    </div>
                                    <div>
                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone
                                            number</label>
                                        <input type="number" name="phone" id="phone"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                            value="{{ $datas->phone }}" placeholder="0812345678">
                                    </div>
                                    <div class="flex mx-auto gap-x-4 w-full">
                                        <div class="flex flex-col w-full">
                                            <label for="country"
                                                class="block mb-2 text-sm font-medium text-gray-900">Country</label>
                                            <input type="text" name="country" id="country"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-auto p-2.5"
                                                value="{{ $datas->country }}" placeholder="country">
                                        </div>
                                        <div class="flex flex-col w-full">
                                            <label for="city"
                                                class="block mb-2 text-sm font-medium text-gray-900">City</label>
                                            <input type="text" name="city" id="city"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-auto p-2.5"
                                                value="{{ $datas->city }}" placeholder="city">
                                        </div>
                                        <div class="flex flex-col w-full">
                                            <label for="postal_code"
                                                class="block mb-2 text-sm font-medium text-gray-900">Postal code</label>
                                            <input type="text" name="postal_code" id="postal_code"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-auto p-2.5"
                                                value="{{ $datas->postal_code }}" placeholder="80990">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="hobbies"
                                            class="block mb-2 text-sm font-medium text-gray-900">Hobby</label>
                                        <input type="text" name="hobbies" id="hobbies"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                            value="{{ $datas->profile->hobbies }}" placeholder="play video games">
                                    </div>
                                    <div>
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="avaliable" value="on" class="sr-only peer" {{
                                                $datas->profile->avaliable ? 'checked' : '' }}
                                            >
                                            <div
                                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4  peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600">
                                            </div>
                                            <span class="ms-3 text-sm font-medium text-gray-900">Avaliable?</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button data-modal-hide="default-modal" type="submit"
                                        class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Change</button>
                                    <button data-modal-hide="default-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Personal Summary</h2>
            <div class="relative mt-2  p-4 bg-transparent border-4 border-gray-200 rounded-xl">
                <p class="text-gray-700 pr-10 capitalize">
                    {{ $datas->profile->personal_summmary ?? 'Write your summary' }}
                </p>

                <div class="absolute right-2 top-2">
                    <button data-modal-target="default-modal-summary" data-modal-toggle="default-modal-summary"
                        type="button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                    </button>
                </div>
                <div id="default-modal-summary" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-3xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Edit Summary
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="default-modal-summary">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <form action="/profile/update-summary" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="p-4 md:p-5 space-y-4">
                                    <div>
                                        <label for="personal_summmary"
                                            class="block mb-2 text-sm font-medium text-gray-900">Personal
                                            summary</label>
                                        <textarea name="personal_summmary" id="personal_summmary"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full"
                                            rows="5"
                                            placeholder="Write about you">{{ $datas->profile->personal_summmary }}</textarea>
                                    </div>
                                </div>

                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button data-modal-hide="default-modal-summary" type="submit"
                                        class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Change</button>
                                    <button data-modal-hide="default-modal-summary" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Career History</h2>
            <p>The more you tell employers about your experience, the more you can stand out.</p>
            <div class="relative mt-2  p-4 bg-transparent border-4 border-gray-200 rounded-xl">
                <p class="text-gray-700 pr-10 capitalize">
                    {{$datas->profile->recent_work ?? 'Write your career history' }}
                </p>

                <div class="absolute right-2 top-2">
                    <button data-modal-target="default-modal-career" data-modal-toggle="default-modal-career"
                        type="button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                    </button>
                </div>
                <div id="default-modal-career" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-3xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Edit Career
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="default-modal-career">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <form action="/profile/update-career" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="p-4 md:p-5 space-y-4">
                                    <div>
                                        <label for="recent_work"
                                            class="block mb-2 text-sm font-medium text-gray-900">Career history</label>
                                        <textarea name="recent_work" id="recent_work"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full"
                                            rows="8"
                                            placeholder="Write your career history">{{$datas->profile->recent_work }}</textarea>

                                    </div>
                                </div>

                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button data-modal-hide="default-modal-career" type="submit"
                                        class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Change</button>
                                    <button data-modal-hide="default-modal-career" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Education --}}
        <div class="mt-6">
            <h2 class="text-3xl font-semibold">Education</h2>
            <p class="text-gray-700 capitalize">{{ $datas->profile->recent_education ?? 'Not set yet' }}</p>
            <button type="button" data-modal-target="default-modal-education"
                data-modal-toggle="default-modal-education" class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 rounded-lg focus:ring-4 focus:ring-pink-300 font-medium
                 text-sm px-5 py-2.5 me-2 mb-2 mt-4 uppercase">add
                education</button>
            <div id="default-modal-education" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-3xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Edit Education
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="default-modal-education">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <form action="/profile/update-education" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="p-4 md:p-5 space-y-4">
                                <div>
                                    <label for="recent_education"
                                        class="block mb-2 text-sm font-medium text-gray-900">Recent
                                        education</label>
                                    <textarea name="recent_education" id="recent_education"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full"
                                        rows="8"
                                        placeholder="Write your education">{{$datas->profile->recent_education }}</textarea>

                                </div>
                            </div>

                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                <button data-modal-hide="default-modal-education" type="submit"
                                    class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Change</button>
                                <button data-modal-hide="default-modal-education" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Skills --}}
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-3">Skils</h2>
            <div class="flex pr-56 m-auto flex-wrap gap-y-3">
                @if (!empty($datas->skills))
                @foreach ($datas->skills as $skill)
                <span
                    class="bg-rose-100 text-pink-500 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">{{
                    $skill }}</span>
                @endforeach
                @else
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">none</span>
                @endif
            </div>
            <button type="button" data-modal-target="default-modal-skills" data-modal-toggle="default-modal-skills"
                class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-4 uppercase">add
                skils</button>
            <div id="default-modal-skills" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-3xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Edit Skills
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="default-modal-skills">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <form action="/profile/update-skills" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="p-4 md:p-5 space-y-4">
                                <div>
                                    <label for="skills" class="block mb-2 text-sm font-medium text-gray-900">Your
                                        Skills</label>
                                    <textarea name="skills" id="skills"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full"
                                        rows="1"
                                        placeholder="PHP, JAVASCRIPT, etc">{{$datas->profile->skills }}</textarea>

                                </div>
                            </div>

                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                <button data-modal-hide="default-modal-skills" type="submit"
                                    class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Change</button>
                                <button data-modal-hide="default-modal-skills" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-6">
            <div class="relative mt-2 p-4 bg-transparent border-4 border-gray-200 rounded-full ">
                <p class="text-gray-700 pr-10 ps-4 capitalize text-2xl">
                    {{ $datas->profile->languages ?? 'none' }}
                </p>

                <div class="absolute right-5 top-4">
                    <button data-modal-target="default-modal-languages" data-modal-toggle="default-modal-languages"
                        type="button">
                        <svg class="w-8 h-8 text-gray-500 hover:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                    </button>
                </div>
                <div id="default-modal-languages" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-3xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Edit Language
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                    data-modal-hide="default-modal-languages">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <form action="/profile/update-languages" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="p-4 md:p-5 space-y-4">
                                    <div>
                                        <label for="languages" class="block mb-2 text-sm font-medium text-gray-900">Your
                                            Language</label>
                                        <textarea name="languages" id="languages"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 w-full"
                                            rows="1" placeholder="Indonesian">{{$datas->profile->languages }}</textarea>

                                    </div>
                                </div>

                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                    <button data-modal-hide="default-modal-languages" type="submit"
                                        class="text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Change</button>
                                    <button data-modal-hide="default-modal-languages" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 mb-10">
                <div class="w-64 mt-2 p-8 bg-transparent border-4 border-gray-200 rounded-xl">
                    <h2 class="text-2xl font-semibold">Resume</h2>
                    @if (isset($datas->profile->resume))
                    <a href="{{ asset('storage/resume/' . $datas->profile->resume) }}"
                        class="text-pink-500 text-lg hover:underline mt-2">Download file</a>
                    @else
                    <p class="text-gray-800 mx-1">None</p>
                    @endif
                    <hr class="px-2 my-3 border-t-2">
                    <button type="button" data-modal-target="default-modal-resume"
                        data-modal-toggle="default-modal-resume"
                        class="text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 uppercase">add
                        resume</button>
                    <div id="default-modal-resume" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-3xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <h3 class="text-xl font-semibold text-gray-900">
                                        Add Resume
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="default-modal-resume">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <form action="/profile/update-resume" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                                for="file_input">Upload resume</label>
                                            <input
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                                aria-describedby="file_input_help" id="file_input" type="file"
                                                name="resume"
                                                value="{{ asset('storage/resume/' . $datas->profile->resume) }}">
                                            <p class="mt-1 text-sm text-gray-500" id="file_input_help">Doc, Docx, Pdf
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                        <button data-modal-hide="default-modal-resume" type="submit"
                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Change</button>
                                        <button data-modal-hide="default-modal-resume" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 border-2 rounded-xl px-16 py-12 mb-5">
            <h2 class="text-3xl font-semibold mb-5">About me</h2>
            <div class="w-full flex justify-between items-center py-4">
                <p class="text-lg text-muted">Hobby</p>
                <p class="text-lg text-muted">{{ $datas->profile->hobbies ? $datas->profile->hobbies : 'none' }}</p>
            </div>
            <hr class="py-2 border-t-2">
            <div class="w-full flex justify-between items-center py-4">
                <p class="text-lg text-muted">Address</p>
                <p class="text-lg text-muted">{{ $datas->address ? $datas->address : 'none' }}</p>
            </div>
            <hr class="py-2 border-t-2">
            <div class="w-full flex justify-between items-center py-4">
                <p class="text-lg text-muted">Country</p>
                <p class="text-lg text-muted">{{ $datas->country ? $datas->country : 'none' }}</p>
            </div>
            <hr class="py-2 border-t-2">
            <div class="w-full flex justify-between items-center py-4">
                <p class="text-lg text-muted">City</p>
                <p class="text-lg text-muted">{{ $datas->city ? $datas->city : 'none' }}</p>
            </div>
            <hr class="py-2 border-t-2">
            <div class="w-full flex justify-between items-center py-4">
                <p class="text-lg text-muted">Postal code</p>
                <p class="text-lg text-muted">{{ $datas->postal_code ? $datas->postal_code : 'none' }}</p>
            </div>
            <hr class="py-2 border-t-2">
            <div class="w-full flex justify-between items-center py-4">
                <p class="text-lg text-muted">Visible</p>
                <div>
                    <form action="/profile/update-is-visible" method="POST">
                        @csrf
                        @method('PUT')
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" onchange="this.form.submit()" name="is_visible" value="on"
                                class="sr-only peer" {{ $datas->profile->is_visible ? 'checked' : '' }}
                            >
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4  peer-focus:ring-pink-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600">
                            </div>
                        </label>
                    </form>
                </div>
            </div>
            <hr class="py-2 border-t-2">
        </div>
    </div>
    <div class="flex-shrink">
        <div>
            <h2 class="text-3xl font-semibold">Certification</h2>
            <hr class="my-3 border-t-2 mt-5">
            <p class="mt-2 text-gray-700 capitalize">Indicate your professional credentials. your relevant certificates,
                memberships and accreditations here.</p>
            <hr class="my-3 border-t-2 mt-5">
            <button type="button" data-modal-target="default-modal-certi" data-modal-toggle="default-modal-certi"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-4 uppercase">add
                Certificate</button>
            <div id="default-modal-certi" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-3xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Add Certificate
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="default-modal-certi">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <form action="/profile/add-certi" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="p-4 md:p-5 space-y-4">
                                <div>
                                    <label for="certi_name"
                                        class="block mb-2 text-sm font-medium text-gray-900">Certificate</label>
                                    <input type="text" name="certi_name" id="certi_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                        value="" placeholder="Certificate name">
                                </div>
                                <div>
                                    <label for="certi_description"
                                        class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                    <input type="text" name="certi_description" id="certi_description"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5"
                                        value="" placeholder="about information">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                                        Certificate</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                        aria-describedby="file_input_help" id="file_input" type="file" name="certi_img"
                                        value="">
                                    <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPEG, JPG
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                <button data-modal-hide="default-modal-certi" type="submit"
                                    class="text-white bg-gradient-to-r from-rose-700 to-pink-600 hover:from-rose-900 hover:to-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Change</button>
                                <button data-modal-hide="default-modal-certi" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 mt-5">
                @if (count($datas->certifications) > 0)
                @foreach ($datas->certifications as $certification)
                <img src="{{ asset('storage/certi/' . $certification->certi_img) }}" alt="certi"
                    class="max-w-64 max-h-20 rounded-lg" />
                @endforeach
                @else
                <img src="https://via.placeholder.com/100" alt="certi" class="max-w-64 rounded-lg">
                <img src="https://via.placeholder.com/100" alt="certi" class="max-w-64 rounded-lg">
                @endif
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