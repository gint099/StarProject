@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 max-w-5xl">
    <h1 class="text-4xl font-bold text-yellow-400 mb-6">Panduan Karakter di Honkai: Star Rail</h1>

    <p class="text-gray-300 mb-6">
        Karakter adalah unit yang dapat dimainkan dalam Honkai: Star Rail. Mereka dapat diperoleh melalui sistem gacha (Warp) maupun event gratis. Setiap karakter memiliki elemen, Path, statistik, dan kemampuan yang unik.
    </p>

    {{-- Statistik Karakter --}}
    <h2 class="text-2xl font-semibold text-white mb-4">Statistik Karakter</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        @php
            $stats = [
                ['atk', 'ATK', 'Jumlah damage yang diberikan oleh karakter.'],
                ['def', 'DEF', 'Mengurangi damage yang diterima.'],
                ['hp', 'HP', 'Jumlah maksimal kerusakan yang bisa diterima.'],
                ['spd', 'Speed', 'Menentukan kecepatan giliran karakter.'],
                ['cr', 'Crit Rate', 'Peluang menghasilkan serangan kritikal.'],
                ['cd', 'Crit DMG', 'Damage tambahan saat kritikal.'],
                ['be', 'Break Effect', 'Meningkatkan efek Weakness Break dan DoT.'],
                ['hr', 'Healing Boost', 'Meningkatkan jumlah penyembuhan.'],
                ['er', 'Energy Regen', 'Mengisi energi lebih cepat.'],
                ['ehr', 'Effect Hit Rate', 'Kemungkinan berhasil memberikan debuff.'],
                ['res', 'Effect RES', 'Kemampuan menahan debuff dari musuh.'],
                ['elemental', 'Elemental DMG Boost', 'Meningkatkan damage berdasarkan elemen.'],
            ];
        @endphp
        @foreach ($stats as [$img, $label, $desc])
            <div class="flex items-start bg-gray-800 p-3 rounded-lg space-x-3">
                <img src="{{ asset('storage/assets/stats/' . $img . '.webp') }}" alt="{{ $label }}" class="w-8 h-8 mt-1">
                <div>
                    <p class="text-yellow-300 font-semibold">{{ $label }}</p>
                    <p class="text-gray-300 text-sm">{{ $desc }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Elemen --}}
    <h2 class="text-2xl font-semibold text-white mb-4">Elemen Karakter</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $elements = ['physical', 'fire', 'ice', 'lightning', 'wind', 'quantum', 'imaginary'];
        @endphp
        @foreach ($elements as $element)
            <div class="flex items-center bg-gray-800 p-3 rounded-lg space-x-3">
                <img src="{{ asset('storage/assets/elements/' . $element . '.png') }}" alt="{{ ucfirst($element) }}" class="w-8 h-8">
                <span class="text-gray-300 capitalize">{{ $element }}</span>
            </div>
        @endforeach
    </div>

    {{-- Path --}}
    <h2 class="text-2xl font-semibold text-white mb-4">Path Karakter (Peran)</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $paths = [
                'destruction' => 'Damage tunggal dan AoE',
                'hunt' => 'Serangan tunggal cepat',
                'erudition' => 'Serangan area (AoE)',
                'harmony' => 'Memberikan buff',
                'nihility' => 'Debuff & DoT',
                'preservation' => 'Tank & mitigasi damage',
                'abundance' => 'Healer',
                'remembrance' => 'Pemanggil (Memosprite)',
            ];
        @endphp
        @foreach ($paths as $path => $desc)
            <div class="flex items-start bg-gray-800 p-3 rounded-lg space-x-3">
                <img src="{{ asset('storage/assets/path/' . $path . '.webp') }}" alt="{{ ucfirst($path) }}" class="w-8 h-8 mt-1">
                <div>
                    <p class="text-yellow-300 font-semibold capitalize">{{ $path }}</p>
                    <p class="text-gray-300 text-sm">{{ $desc }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Skill Karakter --}}
    <h2 class="text-2xl font-semibold text-white mb-4">Kemampuan Karakter</h2>
    <div class="space-y-4 text-gray-300 mb-10">
        <div>
            <span class="text-yellow-400 font-semibold">Basic Attack:</span> Serangan dasar untuk menghasilkan Skill Point. Beberapa karakter memiliki damage besar hanya dari Basic Attack.
        </div>
        <div>
            <span class="text-yellow-400 font-semibold">Skill:</span> Kemampuan aktif yang menggunakan Skill Point, bisa memberikan damage atau efek lainnya.
        </div>
        <div>
            <span class="text-yellow-400 font-semibold">Ultimate:</span> Kemampuan terkuat yang diisi dengan serangan dan aksi tempur. Harus diisi ulang setelah digunakan.
        </div>
        <div>
            <span class="text-yellow-400 font-semibold">Talent:</span> Kemampuan pasif yang aktif dalam kondisi tertentu untuk mendukung karakter atau tim.
        </div>
        <div>
            <span class="text-yellow-400 font-semibold">Technique:</span> Kemampuan luar pertempuran yang digunakan sebelum pertarungan dimulai.
        </div>
    </div>

    <p class="text-sm text-gray-500">Terakhir diperbarui: Juni 2025</p>
</div>
@endsection
