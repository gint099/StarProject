@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 text-white">
    <div x-data="{ tab: 'overview' }" class="flex flex-col lg:flex-row gap-8">
        {{-- Sidebar Image --}}
        <div class="lg:w-1/3 flex-shrink-0">
            <div class="relative">
                <img src="{{ asset('storage/' . $bossGuide->image) }}"
                     alt="{{ $bossGuide->name }}"
                     class="w-full aspect-square object-cover rounded-xl shadow-2xl border-2 border-blue-700/50">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
            </div>
        </div>
        {{-- Main Content --}}
        <div class="lg:w-2/3 w-full">
            {{-- Tab Navigation --}}
            <div class="flex gap-1 mb-6 p-1 bg-black/20 rounded-lg backdrop-blur-sm">
                <button @click="tab = 'overview'"
                        :class="tab === 'overview' ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300 hover:text-white hover:bg-blue-800/50'"
                        class="flex-1 px-4 py-3 rounded-md font-semibold transition-all duration-200">
                    Overview
                </button>
                <button @click="tab = 'location'"
                        :class="tab === 'location' ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300 hover:text-white hover:bg-blue-800/50'"
                        class="flex-1 px-4 py-3 rounded-md font-semibold transition-all duration-200">
                    Location
                </button>
                <button @click="tab = 'teams'"
                        :class="tab === 'teams' ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300 hover:text-white hover:bg-blue-800/50'"
                        class="flex-1 px-4 py-3 rounded-md font-semibold transition-all duration-200">
                    Teams
                </button>
                <button @click="tab = 'strategy'"
                        :class="tab === 'strategy' ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300 hover:text-white hover:bg-blue-800/50'"
                        class="flex-1 px-4 py-3 rounded-md font-semibold transition-all duration-200">
                    Strategy
                </button>
            </div>
            {{-- Content Area --}}
            <div class="bg-gradient-to-br from-blue-900 to-blue-800 p-6 rounded-xl shadow-lg border border-blue-700/50" x-show="tab === 'overview'">
                <h2 class="text-2xl font-bold mb-6 text-blue-200">{{ $bossGuide->name }} Overview</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-black/20 p-4 rounded-lg">
                        <p class="text-blue-200 text-sm">Type</p>
                        <p class="font-semibold">{{ $bossGuide->boss_type }}</p>
                    </div>
                    <div class="bg-black/20 p-4 rounded-lg">
                        <p class="text-blue-200 text-sm">Recommended Level</p>
                        <p class="font-semibold">{{ $bossGuide->recommended_level }}</p>
                    </div>
                    <div class="bg-black/20 p-4 rounded-lg">
                        <p class="text-blue-200 text-sm">Weaknesses</p>
                        <div class="flex flex-wrap gap-1 mt-1">
                            @if (!empty($bossGuide->weaknesses))
                                @foreach ($bossGuide->weaknesses as $weakness)
                                    <img src="{{ asset('storage/assets/elements/' . $weakness . '.png') }}"
                                        alt="{{ $weakness }}"
                                        class="w-10 h-10 rounded-full border-2 border-blue-400/50"
                                        title="{{ $weakness }}">
                                @endforeach
                            @else
                                <span class="text-gray-400">None</span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-black/20 p-4 rounded-lg">
                        <p class="text-blue-200 text-sm">Resistances</p>
                        <div class="flex flex-wrap gap-1 mt-1">
                            @if (!empty($bossGuide->resistances))
                                @foreach ($bossGuide->resistances as $resistances)
                                    <img src="{{ asset('storage/assets/elements/' . $resistances . '.png') }}"
                                        alt="{{ $resistances }}"
                                        class="w-10 h-10 rounded-full border-2 border-blue-400/50"
                                        title="{{ $resistances }}">
                                @endforeach
                            @else
                                <span class="text-gray-400">None</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-blue-900 to-blue-800 p-6 rounded-xl shadow-lg border border-blue-700/50" x-show="tab === 'location'" x-cloak>
                <h2 class="text-2xl font-bold mb-6 text-blue-200">Location</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-black/20 p-4 rounded-lg">
                        <p class="text-blue-200 text-sm">Area</p>
                        <p class="font-semibold">{{ $bossGuide->location }}</p>
                        @if ($bossGuide->location_image)
                            <img src="{{ asset('storage/' . $bossGuide->location_image) }}"
                                alt="Location"
                                class="w-full mt-3 rounded-lg shadow-md">
                        @endif
                    </div>
                    <div class="space-y-4">
                        <div class="bg-black/20 p-4 rounded-lg">
                            <p class="text-blue-200 text-sm">Reset Schedule</p>
                            <p class="font-semibold">{{ $bossGuide->reset_schedule }}</p>
                        </div>
                        <div class="bg-black/20 p-4 rounded-lg">
                            <p class="text-blue-200 text-sm">Trailblaze Cost</p>
                            <div class="flex items-center gap-2 mt-1">
                                <img src="{{ asset('storage/assets/icon/tbp.png') }}"
                                    alt="Trailblaze Power"
                                    class="w-10 h-10">
                                <span class="font-semibold">{{ $bossGuide->trailblaze_cost }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-blue-900 to-blue-800 p-6 rounded-xl shadow-lg border border-blue-700/50" x-show="tab === 'teams'" x-cloak>
                <h2 class="text-2xl font-bold mb-6 text-blue-200">Recommended Teams</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($bossGuide->getTeamCharacters() as $entry)
                        @php $char = $entry['character']; @endphp
                        @if($char)
                            <a href="{{ route('parties.character', $char->id) }}"
                                class="group bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl p-4 text-center hover:ring-2 ring-yellow-500 transition-all duration-300 hover:scale-105">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $char->image) }}"
                                        class="w-50 h-50 object-cover rounded-lg mb-3 group-hover:scale-110 transition-transform duration-300" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-lg"></div>
                                </div>
                                <div class="text-yellow-400 text-xs font-bold mb-1">{{ $entry['role'] }}</div>
                                <div class="text-white text-sm font-medium">{{ $char->name }}</div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="bg-gradient-to-br from-blue-900 to-blue-800 p-6 rounded-xl shadow-lg border border-blue-700/50" x-show="tab === 'strategy'" x-cloak>
                <h2 class="text-2xl font-bold mb-6 text-blue-200">Strategy Guide</h2>
                @foreach ($bossGuide->phase_strategies ?? [] as $phase)
                    <div class="mb-6 bg-black/20 p-4 rounded-lg">
                        <h3 class="text-lg font-bold text-yellow-400 mb-2">
                            {{ $phase['phase'] ?? 'Phase' }}
                        </h3>

                        <p class="text-sm leading-relaxed mb-3">
                            {{ $phase['strategy'] ?? '' }}
                        </p>

                        @if (!empty($phase['strategy_media']))
                            @php
                                $ext = pathinfo($phase['strategy_media'], PATHINFO_EXTENSION);
                            @endphp

                            @if (in_array($ext, ['mp4', 'webm']))
                                <video controls class="rounded-lg w-full max-w-lg mx-auto mt-3">
                                    <source src="{{ asset('storage/' . $phase['strategy_media']) }}" type="video/{{ $ext }}">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <img src="{{ asset('storage/' . $phase['strategy_media']) }}"
                                    alt="Strategy Media"
                                    class="rounded-lg w-full max-w-lg mx-auto mt-3">
                            @endif
                        @endif
                    </div>
                @endforeach

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div class="bg-green-900/20 p-4 rounded-lg border border-green-700/50">
                        <h3 class="font-bold text-green-400 mb-2">Pro Tips</h3>
                        <p class="text-sm leading-relaxed">{{ $bossGuide->pro_tips }}</p>
                    </div>
                    <div class="bg-red-900/20 p-4 rounded-lg border border-red-700/50">
                        <h3 class="font-bold text-red-400 mb-2">Common Mistakes</h3>
                        <p class="text-sm leading-relaxed">{{ $bossGuide->common_mistakes }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
