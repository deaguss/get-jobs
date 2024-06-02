@extends('layouts.main')

@section('title', 'Profile')

@include('partials.header')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center space-x-4">
            <img src="https://via.placeholder.com/100" alt="Avatar" class="w-24 h-24 rounded-full">
            <div>
                <h1 class="text-2xl font-bold">Dede Agus Saputra</h1>
                <p class="text-gray-600">Fullstack Web Developer</p>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Ringkasan Pribadi</h2>
            <p class="mt-2 text-gray-700">
                Greetings, my name is Dede Agus Saputra. I am a fullstack web developer with expertise in Laravel,
                Next.js, Express.js, Node.js, React.js, PHP, JavaScript, and so on. I have been living in Bali since
                childhood and studying at STIKOM Bali Renon since the 2022 academic year. My hobby is workout.
            </p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Riwayat Karier</h2>
            <p class="mt-2 text-gray-700">Semakin Anda memberi tahu perusahaan mengenai pengalaman Anda, semakin Anda
                bisa tampil menonjol.</p>
            <ul class="mt-2 list-disc list-inside">
                <li>I once made a static restaurant web porfolio project from a client, namely my own uncle, using next
                    js and made a fullstack web displaying market products with Laravel.</li>
                <li>I once made a static restaurant web porfolio project from a client, namely my own uncle, using next
                    js and made a fullstack web displaying market products with Laravel.</li>
            </ul>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Pendidikan</h2>
            <p class="mt-2 text-gray-700">Bachelor of Information Technology</p>
            <p class="text-gray-700">STIKOM Institute of Technology and Business Bali, Selesai 2022</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Lisensi & Sertifikasi</h2>
            <p class="mt-2 text-gray-700">Tunjukkan kredensial profesional Anda. Tambahkan lisensi, sertifikat,
                keanggotaan, dan akreditasi Anda yang relevan di sini.</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Keahlian</h2>
            <ul class="mt-2 list-disc list-inside text-gray-700">
                <li>Object-Oriented Programming</li>
                <li>JavaScript Programming</li>
                <li>Express.JS</li>
                <li>Bootstrap</li>
                <li>Tailwind CSS</li>
                <li>CSS</li>
                <li>HTML5</li>
                <li>API</li>
                <li>Next.JS</li>
                <li>JavaScript Programming</li>
                <li>PHP Programming</li>
                <li>Laravel Framework</li>
                <li>React.JS</li>
            </ul>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Bahasa</h2>
            <p class="mt-2 text-gray-700">Indonesian Language</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Resume</h2>
            <p class="mt-2 text-gray-700">Default</p>
            <a href="#" class="text-blue-500">resume.docx</a>
            <p class="text-gray-500">Ditambahkan 4 bulan yang lalu</p>
            <p class="text-gray-700">Resume ini dapat dilihat oleh perusahaan.</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Tentang Jabatan Anda Selanjutnya</h2>
            <p class="mt-2 text-gray-700">Ketersediaan: Sekarang</p>
            <p class="text-gray-700">Jenis pekerjaan yang diharapkan: Full time</p>
            <p class="text-gray-700">Lokasi yang diharapkan: Indonesia, Badung, Bali, Denpasar, Bali</p>
            <p class="text-gray-700">Hak bekerja: Indonesia, Tidak ditentukan</p>
            <p class="text-gray-700">Gaji yang diharapkan: IDR 4.000.000 per bulan</p>
            <p class="text-gray-700">Klasifikasi yang diminati: Teknologi Informasi & Komunikasi, Developer/Programmer
            </p>
            <p class="text-gray-700">Kemungkinan untuk dihubungi: Tampilkan</p>
        </div>
    </div>
</div>

@include("partials.footer")
@endsection