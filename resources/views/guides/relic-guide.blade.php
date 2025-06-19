@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 max-w-4xl">
    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-8 shadow-lg border border-yellow-500/20">

        <h1 class="text-4xl font-extrabold text-yellow-400 mb-6">Panduan Relic</h1>

        <p class="text-gray-300 mb-6 text-lg leading-relaxed">
            <strong>Relic</strong> adalah perlengkapan utama di <em>Honkai: Star Rail</em> yang berperan seperti armor dan aksesori pada game RPG tradisional. Relic memberikan peningkatan statistik penting untuk karakter, seperti HP, ATK, SPD, dan lainnya — menjadikannya komponen kunci dalam perkembangan karakter Anda.
        </p>

        <h2 class="text-2xl text-yellow-400 mt-8 mb-2 font-semibold border-b border-yellow-400 pb-1">📦 Jenis Relic</h2>
        <p class="text-gray-300">Setiap karakter dapat menggunakan 6 jenis Relic berikut ini:</p>
        <ul class="list-disc list-inside text-gray-300 mt-2 space-y-1">
            <li><strong>Head</strong> - HP Flat</li>
            <li><strong>Hands</strong> - ATK Flat</li>
            <li><strong>Body</strong> - HP%, ATK%, DEF%, Crit Rate%, Crit DMG%, Outgoing Healing Boost%, Effect Hit Rate%</li>
            <li><strong>Feet</strong> - HP%, ATK%, DEF%, Speed</li>
            <li><strong>Planar Sphere</strong> - HP%, ATK%, DEF%, Elemental Damage Boost (berdasarkan elemen tertentu)</li>
            <li><strong>Link Rope</strong> - HP%, ATK%, DEF%, Break Effect%, Energy Regen Rate%</li>
        </ul>

        <h2 class="text-2xl text-yellow-400 mt-8 mb-2 font-semibold border-b border-yellow-400 pb-1">📊 Sub-stat</h2>
        <p class="text-gray-300">
            Tiap Relic memiliki satu <strong>Main Stat</strong> dan hingga 4 <strong>Sub-stat</strong> acak yang tidak sama dengan Main Stat-nya. Sub-stat ini diacak saat didapatkan dan tidak bisa diubah, kecuali meningkat saat upgrade.
        </p>
        <p class="text-gray-300 mt-3">Daftar kemungkinan sub-stat:</p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-gray-300 mt-2">
            <span>Flat HP</span>
            <span>Flat ATK</span>
            <span>Flat DEF</span>
            <span>HP%</span>
            <span>ATK%</span>
            <span>DEF%</span>
            <span>Crit Rate%</span>
            <span>Crit DMG%</span>
            <span>Effect Hit Rate%</span>
            <span>Effect RES%</span>
            <span>Break Effect%</span>
            <span>Speed</span>
        </div>

        <p class="text-gray-300 mt-6">
            Saat Relic di-upgrade:
        </p>
        <ul class="list-disc list-inside text-gray-300 mt-2 space-y-1">
            <li>Jika belum memiliki 4 sub-stat, maka akan mendapatkan satu sub-stat baru saat upgrade.</li>
            <li>Jika sudah memiliki 4 sub-stat, maka salah satu sub-stat akan ditingkatkan secara acak.</li>
        </ul>

        <p class="text-gray-300 mt-4">
            Level maksimal ditentukan oleh rarity: mulai dari ★2 hingga ★5. Semakin tinggi rarity, semakin besar statistik dasarnya.
        </p>

        <h2 class="text-2xl text-yellow-400 mt-8 mb-2 font-semibold border-b border-yellow-400 pb-1">🌀 Efek Set</h2>
        <p class="text-gray-300 mb-3">
            Beberapa Relic tergabung dalam sebuah set, dan memakai bagian yang sama dari satu set akan memberikan bonus tambahan. Terdapat 2 jenis set:
        </p>
        <ul class="list-disc list-inside text-gray-300 mt-2 space-y-1">
            <li><strong>Relic Set</strong> — Berlaku untuk Head, Hands, Body, Feet. Memberikan bonus saat memakai 2 atau 4 bagian.</li>
            <li><strong>Planar Ornament Set</strong> — Berlaku untuk Planar Sphere dan Link Rope. Memberikan bonus saat memakai 2 bagian.</li>
        </ul>
        <p class="text-gray-300 mt-3">
            Artinya, Anda bisa menggabungkan satu Relic Set dan satu Ornament Set dalam satu build karakter.
        </p>

        <div class="flex justify-center my-8">
            <a href="{{ route('relics.index') }}" class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-semibold py-2 px-5 rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
                Lihat Daftar Set Relic
            </a>
        </div>

        <p class="text-sm text-gray-500 mt-8 text-center">Terakhir diperbarui: Juni 2025</p>
    </div>
</div>
@endsection
