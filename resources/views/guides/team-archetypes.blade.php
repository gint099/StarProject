@extends('layouts.app')

@section('title', 'Panduan Tipe Tim')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-800 to-gray-900 relative overflow-hidden">
    <!-- Static Background Pattern -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <div class="absolute top-20 left-1/4 w-64 h-64 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl"></div>
            <div class="absolute top-20 right-1/4 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl"></div>
            <div class="absolute bottom-20 left-1/3 w-64 h-64 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl"></div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23374151" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="1.5"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-4 py-16">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 bg-yellow-400/10 backdrop-blur-sm border border-yellow-400/20 rounded-full px-6 py-2 mb-6">
                <span class="text-yellow-400">⚡</span>
                <span class="text-yellow-300 text-sm font-medium">Honkai Star Rail Guide</span>
            </div>

            <h1 class="text-5xl md:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-yellow-300 to-amber-500 mb-6 leading-tight">
                Panduan Tipe Tim
                <br>
                <span class="text-3xl md:text-4xl text-gray-300 font-normal">(Team Archetypes)</span>
            </h1>

            <p class="text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed bg-white/5 backdrop-blur-sm rounded-2xl p-6 border border-white/10">
                Dalam <span class="text-yellow-400 font-semibold">Honkai: Star Rail</span>, komposisi tim biasanya mengikuti pola tertentu berdasarkan gaya bermain dan mekanik utama dalam pertarungan. Berikut adalah beberapa tipe tim (archetype) paling umum beserta contoh karakter yang cocok.
            </p>
        </div>

        @php
            $archetypes = [
                [
                    'title' => 'Tipe Crit',
                    'icon' => '⚔️',
                    'color' => 'yellow',
                    'gradient' => 'from-yellow-400 to-amber-600',
                    'bg' => 'from-yellow-500/20 to-amber-600/20',
                    'desc' => 'Fokus pada critical hit besar sebagai sumber utama damage. Biasanya terdiri dari satu DPS utama dan support ofensif.',
                    'pros' => [
                        'Fleksibel dan cocok untuk banyak komposisi tim.',
                        'Cukup investasi besar pada satu karakter DPS.',
                    ],
                    'cons' => [
                        'Jika DPS terkena crowd controlled atau mati, tim kehilangan kekuatan utama.',
                        'Relic harus sangat optimal.',
                    ],
                    'characters' => $critCharacters,
                ],
                [
                    'title' => 'Tipe Break',
                    'icon' => '💥',
                    'color' => 'blue',
                    'gradient' => 'from-blue-400 to-cyan-600',
                    'bg' => 'from-blue-500/20 to-cyan-600/20',
                    'desc' => 'Memanfaatkan Weakness Break dan Break DMG sebagai sumber utama damage.',
                    'pros' => [
                        'Build simpel, fokus pada SPD dan Break Effect.',
                        'Punya efek crowd control alami.',
                    ],
                    'cons' => [
                        'Bergantung pada elemen musuh.',
                        'Perlu perhatian siapa yang melakukan break.',
                    ],
                    'characters' => $breakCharacters,
                ],
                [
                    'title' => 'Follow-Up Attack (FuA)',
                    'icon' => '🎯',
                    'color' => 'purple',
                    'gradient' => 'from-purple-400 to-indigo-600',
                    'bg' => 'from-purple-500/20 to-indigo-600/20',
                    'desc' => 'Damage datang dari serangan otomatis di luar giliran seperti Lightning Lord, Numby, dll.',
                    'pros' => [
                        'Banyak serangan tambahan, efektif untuk break.',
                        'Beragam gaya main tergantung karakter.',
                    ],
                    'cons' => [
                        'Crowd control sangat merugikan.',
                        'Kurang fleksibel karena kondisi trigger spesifik.',
                    ],
                    'characters' => $fuaCharacters,
                ],
                [
                    'title' => 'Damage over Time (DoT)',
                    'icon' => '☠️',
                    'color' => 'green',
                    'gradient' => 'from-green-400 to-emerald-600',
                    'bg' => 'from-green-500/20 to-emerald-600/20',
                    'desc' => 'Mengandalkan efek DoT seperti Burn, Shock, Wind Shear untuk menguras HP musuh secara bertahap.',
                    'pros' => [
                        'Bagus untuk lawan banyak musuh.',
                        'Tidak perlu peduli Toughness Bar.',
                    ],
                    'cons' => [
                        'Lambat tanpa karakter pemicu seperti Kafka.',
                        'Perlu waktu setup dan banyak debuff.',
                    ],
                    'characters' => $dotCharacters,
                ],
            ];
        @endphp

        <!-- Archetype Cards -->
        <div class="space-y-8">
            @foreach ($archetypes as $index => $archetype)
                <div class="relative">
                    <!-- Main card -->
                    <div class="backdrop-blur-xl bg-gradient-to-r {{ $archetype['bg'] }} border border-{{ $archetype['color'] }}-400/30 rounded-3xl p-8">

                        <!-- Header -->
                        <div class="flex items-start gap-6 mb-8">
                            <div class="flex-shrink-0 w-20 h-20 bg-{{ $archetype['color'] }}-400/20 backdrop-blur-sm rounded-2xl flex items-center justify-center text-4xl">
                                {{ $archetype['icon'] }}
                            </div>
                            <div class="flex-1">
                                <h2 class="text-3xl font-bold text-{{ $archetype['color'] }}-300 mb-3">{{ $archetype['title'] }}</h2>
                                <p class="text-gray-300 text-lg leading-relaxed">{{ $archetype['desc'] }}</p>
                            </div>
                        </div>

                        <!-- Content Grid -->
                        <div class="grid lg:grid-cols-3 gap-6">
                            <!-- Pros -->
                            <div class="bg-green-500/10 backdrop-blur-sm rounded-2xl p-6 border border-green-500/20">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                                        <span class="text-green-400 text-sm font-bold">✓</span>
                                    </div>
                                    <h3 class="text-green-300 font-bold text-lg">Kelebihan</h3>
                                </div>
                                <ul class="space-y-3">
                                    @foreach ($archetype['pros'] as $pro)
                                        <li class="flex items-start gap-3">
                                            <span class="text-green-400 mt-1.5 text-xs">●</span>
                                            <span class="text-green-100 text-sm leading-relaxed">{{ $pro }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Cons -->
                            <div class="bg-red-500/10 backdrop-blur-sm rounded-2xl p-6 border border-red-500/20">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 bg-red-500/20 rounded-full flex items-center justify-center">
                                        <span class="text-red-400 text-sm font-bold">!</span>
                                    </div>
                                    <h3 class="text-red-300 font-bold text-lg">Kekurangan</h3>
                                </div>
                                <ul class="space-y-3">
                                    @foreach ($archetype['cons'] as $con)
                                        <li class="flex items-start gap-3">
                                            <span class="text-red-400 mt-1.5 text-xs">●</span>
                                            <span class="text-red-100 text-sm leading-relaxed">{{ $con }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Characters -->
                            <div class="bg-{{ $archetype['color'] }}-500/10 backdrop-blur-sm rounded-2xl p-6 border border-{{ $archetype['color'] }}-500/20">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 bg-{{ $archetype['color'] }}-500/20 rounded-full flex items-center justify-center">
                                        <span class="text-{{ $archetype['color'] }}-400 text-sm font-bold">★</span>
                                    </div>
                                    <h3 class="text-{{ $archetype['color'] }}-300 font-bold text-lg">Contoh Karakter</h3>
                                </div>

                                @forelse ($archetype['characters'] as $char)
                                    <div class="grid grid-cols-3 gap-3">
                                        @foreach ($archetype['characters'] as $char)
                                            <div class="relative">
                                                <div class="aspect-square rounded-xl overflow-hidden border-2 border-{{ $archetype['color'] }}-400/30">
                                                    <img src="{{ asset($char->profile_image) }}"
                                                         alt="{{ $char->name }}"
                                                         title="{{ $char->name }}"
                                                         class="w-full h-full object-cover">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <div class="text-gray-400 text-sm mb-2">📋</div>
                                        <p class="text-gray-400 text-sm">Belum ada karakter terdaftar.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Footer -->
        <div class="mt-20 text-center">
            <div class="inline-flex items-center gap-3 bg-white/5 backdrop-blur-sm border border-white/10 rounded-full px-8 py-4">
                <div class="flex gap-1">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
                </div>
                <p class="text-gray-400 text-sm">
                    Halaman panduan ini hanya diperbarui jika terjadi perubahan besar dalam sistem game atau meta.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
