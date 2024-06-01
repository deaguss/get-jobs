<nav class="border-gray-200 bg-gray-50">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-bold whitespace-nowrap ">Get <span
                    class="text-indigo-600">jobs</span></span>
        </a>

        {{-- Hamburger Menu --}}
        <button data-collapse-toggle="navbar-solid-bg" type="button"
            class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>


        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul
                class="flex flex-col mt-4 font-medium rounded-lg md:items-center bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-white bg-blue-700 rounded md:p-0 md:bg-transparent md:text-blue-700"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700">Services</a>
                </li>
                <li>
                    <a href="#" id="dropdownNavbarLinkProfile"
                        class="flex items-center px-3 py-2 text-gray-900 rounded-full md:p-0 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700">
                        <img src="https://images.unsplash.com/photo-1714138667513-77ba2f00e85b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="" class="rounded-full" style="width: 30px; height: 30px; object-fit: cover;">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m8 10 4 4 4-4" />
                        </svg>

                    </a>

                    {{-- Dropdown from profile menu, id="dropdownNavbarLinkProfile"--}}
                    <div id="dropdownNavbarLinkProfilePage"
                        class="z-10 hidden absolute md:right-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Datuk</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Datuk</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Datuk</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>


<script>
    const dropdown = document.getElementById('dropdownNavbarLinkProfile');
    const dropdownLink = document.getElementById('dropdownNavbarLinkProfilePage');

    dropdown.addEventListener('click', () => {
        dropdownLink.classList.toggle('hidden');
    })
</script>
