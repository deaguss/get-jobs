@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')


{{-- Banner Company --}}
<div class="w-full bg-[#051A49] rounded-xl h-64 flex justify-center items-center">
    <h1 class="text-white font-bold text-4xl">Company Banner</h1>
</div>

{{-- Section Profile --}}
<section class="p-5">
    <div class="flex flex-col gap-y-3 mt-5">
        <h1 class="text-4xl font-bold ">Company Name</h1>
        <p class="text-xl">Company Industry</p>
    </div>

    {{-- Tabs --}}
    <div class="w-full mt-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="me-2">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="true"
                    class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">About</button>
            </li>
            <li class="me-2">
                <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services"
                    aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jobs
                    Available</button>
            </li>

        </ul>

        <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                aria-labelledby="about-tab">
                <div>
                    <h1 class="text-2xl font-bold pb-2">Company Description</h1>
                    <p class="font-normal text-gray-700 text-justify">Lorem ipsum dolor sit amet
                        consectetur
                        adipisicing
                        elit. Repellat velit, aliquam odit, quam quidem nisi nesciunt consectetur nihil adipisci
                        voluptatem
                        ut
                        similique unde? Consectetur dolor fugit, repellat animi earum maiores. Harum qui quaerat, ipsum
                        maiores
                        perspiciatis quis ad quod aspernatur assumenda quibusdam? Facere quas soluta officiis, fugiat,
                        recusandae minus nemo eligendi magnam consequatur est error in odit quod. Voluptate iste
                        voluptates
                        aperiam! Cumque deserunt ipsam, nam eaque hic voluptatem culpa laborum vel, facere, eum
                        explicabo
                        sequi
                        assumenda magnam corrupti similique. Inventore ut possimus rem deleniti nemo voluptatibus neque
                        aut
                        eligendi totam ducimus odit, debitis nobis minus culpa eius ipsam sit animi. Consectetur
                        temporibus
                        illum eveniet magnam dicta optio minus sit vero quam, qui deleniti. Molestias incidunt quae quam
                        suscipit. Blanditiis officia doloremque eum eaque facere, ab beatae consequuntur ducimus,
                        obcaecati
                        id
                        at pariatur unde recusandae quos. Amet, harum ab. Voluptatibus maxime, officia corrupti
                        voluptatem
                        at
                        perspiciatis corporis, fugiat expedita delectus reiciendis architecto facilis animi. Quia iusto
                        molestias corporis perspiciatis, esse eligendi quidem temporibus, vel alias quibusdam deserunt
                        perferendis voluptate laboriosam deleniti sapiente. Neque doloribus explicabo vitae repellendus
                        excepturi, voluptatibus eum unde ut, perferendis reiciendis odio, animi ea quasi! A, eligendi!
                        Eius
                        alias nulla animi id quia quasi est natus ut distinctio officia quos, nesciunt perferendis.
                        Voluptate,
                        hic rerum corporis in delectus, quibusdam quisquam saepe consequuntur ratione blanditiis
                        consequatur
                        at
                        fugit ab ipsa quis, id molestias laudantium numquam officia! Minus qui ratione iure voluptatibus
                        vero
                        numquam nisi iste officia itaque aut dignissimos debitis modi dicta architecto enim eveniet
                        dolorum
                        asperiores, harum facilis quaerat accusamus facere eum doloremque dolores. Consequatur, enim
                        quisquam.
                        Sit iure tempora officia labore fugit est rem ducimus illo quae modi. Saepe vitae facere alias
                        nobis
                        asperiores officiis, dolores magni ut, laboriosam eveniet provident accusantium est omnis ad
                        quia
                        sunt
                        commodi vel minima nulla perspiciatis rerum deleniti sed porro!S</p>
                </div>

                <div class="pt-6">
                    <h1 class="text-2xl font-bold pb-2">Photos</h1>
                    <div class="grid grid-cols-4 gap-4">
                        <img class="w-full rounded-lg"
                            src="https://images.unsplash.com/photo-1531973576160-7125cd663d86?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y29tcGFueXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="">
                        <img class="w-full rounded-lg"
                            src="https://images.unsplash.com/photo-1531973576160-7125cd663d86?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y29tcGFueXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="">
                        <img class="w-full rounded-lg"
                            src="https://images.unsplash.com/photo-1531973576160-7125cd663d86?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y29tcGFueXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="">
                        <img class="w-full rounded-lg"
                            src="https://images.unsplash.com/photo-1531973576160-7125cd663d86?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y29tcGFueXxlbnwwfHwwfHx8MA%3D%3D"
                            alt="">
                    </div>
                </div>
            </div>

            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel"
                aria-labelledby="services-tab">
                <div>
                    <form action="">
                        <input class="rounded-md" type="text" name="" id="">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search
                        </button>
                    </form>
                    <div class="grid grid-cols-4 gap-4">
                        @for($i = 0; $i < 8; $i++) <a href="#"
                            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Job Title
                            </h5>
                            <p class="font-normal text-gray-700  opacity-50"><i>Location</i></p>
                            <p class="font-normal text-gray-700 text-justify">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit.
                                Nihil distinctio modi ratione....</p>
                            </a>
                            @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- --}}




<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add('hidden');
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove('active');
        }
        evt.currentTarget.classList.add('active');
        document.getElementById(tabName).classList.remove('hidden');
    }
</script>

@include("partials.footer")
@endsection