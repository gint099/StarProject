@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-4xl font-bold text-white mb-6">Guides</h1>

    <div class="space-y-4">
        <a href="{{ route('guides.character') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Panduan Karakter</h2>
            <p class="text-gray-300 text-sm">Penjelasan lengkap tentang statistik, elemen, Path, dan kemampuan karakter dalam Honkai: Star Rail.</p>
        </a>

        <a href="{{ route('guides.character-progression') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Panduan Pengembangan Karakter</h2>
            <p class="text-gray-300 text-sm">Pelajari bagaimana cara menaikkan level karakter, meningkatkan Traces, membuka Eidolon, dan lebih banyak lagi.</p>
        </a>

        <a href="{{ route('guides.light-cones') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Panduan Light Cone</h2>
            <p class="text-gray-300 text-sm">Penjelasan lengkap tentang fungsi, superimpose, dan kesesuaian Path pada Light Cone.</p>
        </a>

        <a href="{{ route('guides.relics') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Panduan Relic</h2>
            <p class="text-gray-300 text-sm">Penjelasan lengkap tentang fungsi, stat, dan efek set dari semua jenis Relic.</p>
        </a>

        <a href="{{ route('guides.exploration') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Panduan Eksplorasi</h2>
            <p class="text-gray-300 text-sm">Tips menjelajahi dunia Honkai: Star Rail, teknik bertarung, dan penggunaan peta interaktif.</p>
        </a>

        <a href="{{ route('guides.combat') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Panduan Sistem Pertarungan</h2>
            <p class="text-gray-300 text-sm">Pelajari sistem turn-based, Weakness Break, dan strategi energi dalam pertarungan HSR.</p>
        </a>

        <a href="{{ route('guides.team-archetypes') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Panduan Tipe Tim</h2>
            <p class="text-gray-300 text-sm">Pelajari berbagai arketipe tim dan cara membangun komposisi yang efektif.</p>

        <a href="{{ route('guides.daily-farming') }}" class="block bg-gray-800 p-4 rounded hover:bg-gray-700 transition">
            <h2 class="text-xl font-semibold text-yellow-400">Daily Farming Route</h2>
            <p class="text-gray-300 text-sm">Panduan farming monster harian untuk EXP karakter dan material tanpa menghabiskan Stamina.</p>
        </a>

    </div>
</div>
@endsection
