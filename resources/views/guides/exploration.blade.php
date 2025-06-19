@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 max-w-4xl">
    <h1 class="text-4xl font-extrabold text-yellow-400 mb-6">Panduan Eksplorasi Honkai: Star Rail</h1>

    <p class="text-gray-300 text-lg leading-relaxed mb-6">
        Jelajahi dunia <span class="text-white font-semibold">Honkai: Star Rail</span> untuk menemukan <span class="text-blue-300">peti harta</span>, <span class="text-red-300">musuh roaming</span>, dan <span class="text-purple-300">teka-teki tersembunyi</span>. Setiap zona eksplorasi memiliki pengalaman unik dengan tantangan dan hadiah menarik.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Active Character --}}
        <div class="bg-gray-800 rounded-2xl p-6 shadow-lg">
            <h2 class="text-2xl text-yellow-300 font-semibold mb-2">🎮 Karakter Aktif</h2>
            <p class="text-gray-300 text-sm">
                Saat menjelajah, Anda akan mengontrol satu dari empat karakter dalam tim. Anda dapat <span class="text-white font-semibold">berganti karakter kapan saja</span> selama tidak dalam pertempuran.
            </p>
        </div>

        {{-- Musuh di overworld --}}
        <div class="bg-gray-800 rounded-2xl p-6 shadow-lg">
            <h2 class="text-2xl text-red-400 font-semibold mb-2">👹 Musuh di Overworld</h2>
            <p class="text-gray-300 text-sm">
                Musuh akan mengejar Anda jika terlalu dekat. Jika mereka menyentuh Anda sebelum Anda menyerang, <span class="text-red-300 font-semibold">Anda akan disergap</span> dan giliran pertama jadi milik musuh.
            </p>
        </div>

        {{-- Inisiasi Pertempuran --}}
        <div class="bg-gray-800 rounded-2xl p-6 shadow-lg">
            <h2 class="text-2xl text-green-400 font-semibold mb-2">⚔️ Memulai Pertempuran</h2>
            <ul class="list-disc list-inside text-gray-300 text-sm space-y-1">
                <li>Gunakan <span class="text-white font-semibold">Basic Attack</span> untuk menyerang musuh lebih dulu.</li>
                <li>Gunakan <span class="text-white font-semibold">Technique Ability</span> untuk serangan khusus (mengonsumsi Technique Charge).</li>
                <li>Jika Anda diserang duluan, pertarungan dimulai dalam kondisi <span class="text-red-300 font-semibold">Ambushed</span>.</li>
            </ul>
        </div>

        {{-- Technique Charge --}}
        <div class="bg-gray-800 rounded-2xl p-6 shadow-lg">
            <h2 class="text-2xl text-purple-300 font-semibold mb-2">🧪 Technique Charge</h2>
            <ul class="list-disc list-inside text-gray-300 text-sm space-y-1">
                <li>Batas charge bertambah seiring naiknya <span class="text-white font-semibold">Trailblaze Level</span>.</li>
                <li>Hancurkan <span class="text-purple-200">kontainer ungu</span> di overworld untuk mengisi kembali (2 charge per kontainer).</li>
                <li>Biasanya ditemukan di dekat <span class="text-white">Space Anchor</span> atau <span class="text-white">Calyx</span>.</li>
            </ul>
        </div>

    </div>

    {{-- Interactive Map --}}
    <div class="bg-gray-900 mt-10 p-6 rounded-xl shadow-xl border border-yellow-500">
        <h2 class="text-2xl text-yellow-400 font-bold mb-2">🗺️ Gunakan Peta Interaktif Resmi</h2>
        <p class="text-gray-300 mb-3 text-sm">
            Kesulitan menemukan semua peti, puzzle, atau musuh elite? Gunakan <span class="text-white font-semibold">peta interaktif resmi</span> dari HoYoLab untuk navigasi yang lebih mudah.
        </p>
        <a href="https://act.hoyolab.com/sr/app/interactive-map/#/map/38?zoom=&center=&origin_map_id=&shown_types=24,49,306,321,2,3,4,5,6,7,8,9,10,11,12,134,135,195,196,230,439,440,626"
           class="inline-block bg-yellow-500 text-gray-900 font-bold px-4 py-2 rounded hover:bg-yellow-400 transition"
           target="_blank">
            🔗 Buka Peta Interaktif Sekarang
        </a>
    </div>

    <p class="text-xs text-gray-500 mt-10 text-right italic">Terakhir diperbarui: Juni 2025</p>
</div>
@endsection
