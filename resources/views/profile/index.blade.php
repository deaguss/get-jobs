@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')
<div class="container flex p-4 gap-x-5 w-full">
    <div class="bg-white rounded-lg">
        <div class="flex items-center space-x-4 bg-gradient-to-r from-rose-700 to-pink-600 py-8 px-3 rounded-xl">
            <img src="https://via.placeholder.com/100" alt="Avatar" class="w-40 h-40 rounded-full">
            <div>
                <h1 class="text-3xl font-bold text-gray-200">Index Next Js</h1>
                <p class="text-gray-200 flex items-center gap-x-2 leading-none mt-4">
                    <svg class="w-5 h-5 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                    </svg>
                    index@gmail.com
                </p>
                <span
                    class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300 mt-1 ">
                    <span class="w-1.5 h-1.5 me-1 bg-green-500 rounded-full"></span>
                    Available
                </span>
                <button type="button"
                    class="text-gray-200 bg-transparent hover:bg-gray-100/20 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1.5 me-2 mb-2 flex mt-4">
                    Edit
                </button>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Personal Summary</h2>
            <div class="relative mt-2  p-4 bg-transparent border-4 border-gray-200 rounded-xl">
                <p class="text-gray-700 pr-10 capitalize">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe dolores exercitationem tenetur
                    expedita
                    ex neque non voluptatibus quas fugiat aliquam molestiae, deserunt, laborum tempora velit impedit
                    magni
                    quo ratione cupiditate, reprehenderit placeat excepturi! Quisquam voluptatem, odio repellat quo
                    quidem
                    deleniti? Vitae et ea mollitia libero deleniti similique voluptatem odit labore?
                </p>

                <div class="absolute right-2 top-2">
                    <button>
                        <svg class="w-6 h-6 text-gray-500 hover:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Career History</h2>
            <p>The more you tell employers about your experience, the more you can stand out.</p>
            <div class="relative mt-2  p-4 bg-transparent border-4 border-gray-200 rounded-xl">
                <p class="text-gray-700 pr-10 capitalize">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe dolores exercitationem tenetur
                    expedita
                    ex neque non voluptatibus quas fugiat aliquam molestiae, deserunt, laborum tempora velit impedit
                    magni
                    quo ratione cupiditate, reprehenderit placeat excepturi! Quisquam voluptatem, odio repellat quo
                    quidem
                    deleniti? Vitae et ea mollitia libero deleniti similique voluptatem odit labore?
                </p>

                <div class="absolute right-2 top-2">
                    <button>
                        <svg class="w-6 h-6 text-gray-500 hover:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-3xl font-semibold">Education</h2>
            <p class="mt-2 text-gray-700">Bachelor of Information Technology</p>
            <p class="text-gray-700 capitalize">STIKOM Institute of Technology and Business Bali, Selesai 2022</p>
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-4 uppercase">add
                education</button>
        </div>
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-3">Skils</h2>
            <div class="flex pr-56 m-auto flex-wrap gap-y-3">
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">HTML5</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">CSS</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">PYTHON</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">C++</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">JAVASCRIPT</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">TAILWIND
                    CSS</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">BOOTSTRAP
                    CSS</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline-flex items-center uppercase">NEXT
                    JS</span>
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-1 rounded inline uppercase">PHP</span>
            </div>
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-4 uppercase">add
                skils</button>
        </div>

        <div class="mt-6">
            <div class="relative mt-2 p-4 bg-transparent border-4 border-gray-200 rounded-full ">
                <p class="text-gray-700 pr-10 ps-4 capitalize text-2xl">
                    indonesia
                </p>

                <div class="absolute right-5 top-4">
                    <button>
                        <svg class="w-8 h-8 text-gray-500 hover:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mt-6 mb-10">
                <div class="w-64 mt-2 p-8 bg-transparent border-4 border-gray-200 rounded-xl">
                    <h2 class="text-2xl font-semibold">Resume</h2>
                    <a href="#" class="text-blue-500 text-lg hover:underline">resume.docx</a>
                    <p class="text-gray-500">Added 4 months ago</p>
                    <hr class="px-2 my-3 border-t-2 mt-5">
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 uppercase">add
                        resume</button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-shrink">
        <div>
            <h2 class="text-3xl font-semibold">Certification</h2>
            <hr class="my-3 border-t-2 mt-5">
            <p class="mt-2 text-gray-700 capitalize">Indicate your professional credentials. your relevant certificates,
                memberships and accreditations here.</p>
            <div class="flex flex-wrap gap-y-4 gap-x-2 mt-5">
                <img src="https://via.placeholder.com/100" alt="Avatar" class="w-25 h-25 rounded-lg">
                <img src="https://via.placeholder.com/100" alt="Avatar" class="w-25 h-25 rounded-lg">
                <img src="https://via.placeholder.com/100" alt="Avatar" class="w-25 h-25 rounded-lg">
            </div>
        </div>
    </div>
</div>

@include("partials.footer")
@endsection