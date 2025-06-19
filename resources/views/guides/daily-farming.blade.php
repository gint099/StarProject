@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 max-w-4xl text-gray-300">
    {{-- Judul --}}
    <h1 class="text-4xl font-bold text-yellow-400 mb-4 flex items-center gap-3">
        {{-- <img src="/assets/icons/calendar.png" alt="Daily Icon" class="w-8 h-8"> --}}
        Daily Farming Route
    </h1>

    {{-- Intro --}}
    <p class="mb-6 text-lg leading-relaxed">
        Jika kamu merasa <span class="text-yellow-300 font-semibold">harianmu terlalu cepat selesai</span> dan masih ingin grinding lebih jauh tanpa membuang Trailblaze Power, maka <strong>Daily Farming Route</strong> ini cocok banget untuk kamu!
    </p>

    {{-- Kenapa Perlu --}}
    <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg">
        <h2 class="text-2xl font-semibold text-white mb-2 flex items-center gap-2">
            {{-- <img src="/assets/icons/question.png" class="w-6 h-6"> --}}
            Kenapa Perlu Melakukannya?
        </h2>
        <p class="text-gray-300">
            Monster di overworld tidak hilang permanen setelah dibunuh — mereka <span class="text-green-400 font-semibold">respawn setiap reset harian</span>. Ini artinya, setelah menyelesaikan Daily Mission, kamu bisa tetap bermain dengan farming monster untuk mendapatkan EXP, Credit, dan material penting.
        </p>
    </div>

    {{-- Keuntungan --}}
    <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg">
        <h2 class="text-2xl font-semibold text-white mb-2 flex items-center gap-2">
            {{-- <img src="/assets/icons/reward.png" class="w-6 h-6"> --}}
            Apa yang Bisa Didapatkan?
        </h2>
        <ul class="list-disc list-inside space-y-3">
            <li>
                <span class="text-yellow-300 font-semibold">EXP Karakter</span>
                – Meski tidak meningkatkan Trailblaze Level, membunuh monster memberikan EXP ke seluruh tim aktif. Ini sangat efektif untuk leveling karakter baru.
                <br>
                <span class="text-sm text-gray-400">Di EQ6, satu rotasi farming bisa memberi ±<strong>104.000 EXP</strong> dan <strong>61.000 Credit</strong> per karakter.</span>
            </li>
            <li>
                <span class="text-yellow-300 font-semibold">Material Trace & Ascension</span>
                – Jumlah trace material yang dibutuhkan sangat banyak, dan farming ini membantu menghemat banyak Stamina karena drop-nya langsung dari monster.
            </li>
        </ul>
    </div>

    {{-- Waktu --}}
    <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg">
        <h2 class="text-2xl font-semibold text-white mb-2 flex items-center gap-2">
            {{-- <img src="/assets/icons/clock.png" class="w-6 h-6"> --}}
            Berapa Lama Waktu yang Dibutuhkan?
        </h2>
        <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li><span class="text-blue-400 font-semibold">Tanpa Acheron:</span> ±2,5 jam</li>
            <li><span class="text-purple-400 font-semibold">Dengan Acheron:</span> ±45–50 menit</li>
        </ul>
        <p class="text-gray-400 mt-2 text-sm">Acheron dengan AoE yang cepat sangat membantu menyelesaikan rotasi dengan efisien.</p>
    </div>

    {{-- Referensi --}}
    <div class="bg-gray-800 rounded-lg p-6 mb-6 shadow-lg">
        <h2 class="text-2xl font-semibold text-white mb-2 flex items-center gap-2">
            {{-- <img src="/assets/icons/link.png" class="w-6 h-6"> --}}
            Referensi dan Kredit
        </h2>
        <p>
            Terima kasih kepada <span class="text-green-400 font-semibold">jolteh</span> yang telah membuat dokumen farming lengkap (termasuk teleport point untuk Acheron) agar kamu bisa menjalankan rute ini secara efisien.
        </p>

        <a href="https://docs.google.com/document/d/1ORcXvBcmGuGqYSTSWGOBisaLjQlb2J7kBr6KSSS8KN4/edit?tab=t.0"
           target="_blank"
           class="inline-block mt-3 px-4 py-2 bg-yellow-500 text-black font-semibold rounded hover:bg-yellow-400 transition">
            🔗 Buka Dokumen Farming Lengkap
        </a>
    </div>

    {{-- Footer --}}
    <p class="text-sm text-gray-500 mt-10">📅 Terakhir diperbarui: Juni 2025</p>
</div>
@endsection
