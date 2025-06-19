@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold text-yellow-400 mb-6 border-b border-yellow-600 pb-2">
        Panduan Pengembangan Karakter
    </h1>

    <p class="text-gray-300 text-lg leading-relaxed mb-6">
        Mengembangkan karakter di <strong>Honkai: Star Rail</strong> sangat penting untuk memperkuat tim Anda dan membuka akses ke konten end-game. Panduan ini menjelaskan langkah-langkah penting dalam memaksimalkan potensi setiap karakter.
    </p>

    {{-- Section: Ringkasan --}}
    <div class="bg-gray-800 p-6 rounded-xl mb-8 border border-gray-700 shadow">
        <h2 class="text-2xl font-semibold text-yellow-300 mb-4">Cara Menguatkan Karakter:</h2>
        <ul class="grid sm:grid-cols-2 gap-4 text-gray-300 text-base list-disc list-inside">
            <li>🔼 Meningkatkan Level Karakter</li>
            <li>🌟 Meningkatkan Traces (Skill Tree)</li>
            <li>✨ Membuka Eidolon</li>
            <li>🪄 Melengkapi Light Cone</li>
            <li>🧩 Melengkapi Relic dan Ornament</li>
        </ul>
    </div>

    {{-- Section: Level dan Ascension --}}
    <section class="mb-10">
        <h2 class="text-2xl font-bold text-yellow-300 mb-3 flex items-center">
            <img src="/storage/assets/icon/character.png" alt="Level Icon" class="w-6 h-6 mr-2"> Level Karakter & Ascension
        </h2>
        <p class="text-gray-300 mb-4">
            Karakter memiliki level dari 1 hingga 80. Untuk naik ke level lebih tinggi, Anda perlu melakukan <strong>Ascension</strong>. Awalnya, batas level adalah 20, lalu meningkat setiap kali Ascension hingga maksimum 80.
        </p>
        <p class="text-gray-300 mb-4">
            Ascension membutuhkan material dari musuh dan boss <em>Stagnant Shadow</em>. Namun, proses ini juga dibatasi oleh <strong>Trailblaze Level</strong> Anda. Pastikan level akun Anda cukup sebelum mencoba Ascension.
        </p>
    </section>

    {{-- Section: Traces --}}
    <section class="mb-10">
        <h2 class="text-2xl font-bold text-yellow-300 mb-3 flex items-center">
            <img src="/storage/assets/icon/trace.webp" alt="Trace Icon" class="w-6 h-6 mr-2"> Traces (Pohon Skill)
        </h2>
        <p class="text-gray-300 mb-4">
            Traces adalah sistem upgrade skill yang memberikan peningkatan statistik, efek pasif baru, dan peningkatan skill aktif. Traces dibuka dan ditingkatkan menggunakan material dari <strong>Crimson Calyx</strong> dan misi.
        </p>
        <p class="text-gray-300 mb-4">
            Beberapa node Trace hanya bisa dibuka setelah karakter mencapai tahap Ascension tertentu.
        </p>
    </section>

    {{-- Section: Eidolon --}}
    <section class="mb-10">
        <h2 class="text-2xl font-bold text-yellow-300 mb-3 flex items-center">
            <img src="/storage/assets/icon/eidolon.webp" alt="Eidolon Icon" class="w-6 h-6 mr-2"> Eidolon
        </h2>
        <p class="text-gray-300 mb-4">
            Eidolon memberikan peningkatan besar pada skill atau pasif karakter. Terdapat 6 tingkatan Eidolon, yang umumnya dibuka melalui duplikat karakter dari Warp (gacha).
        </p>
        <p class="text-gray-300 mb-4">
            Untuk karakter utama (Trailblazer), Eidolon bisa diperoleh dari progres misi dan hadiah Trailblaze Level.
        </p>
    </section>

    {{-- Footer --}}
    <div class="text-right text-sm text-gray-500 mt-8">
        Terakhir diperbarui: Juni 2025
    </div>
</div>
@endsection
