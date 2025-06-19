@extends('layouts.app')

@section('content')
<div class="relative w-full min-h-screen overflow-x-hidden text-white">

    {{-- Background Image --}}
    @if ($lightcone->background_image)
        <img src="{{ asset('storage/' . $lightcone->background_image) }}"
             class="absolute left-0 top-0 h-full w-150 z-0 opacity-30 object-cover blur-sm" />
    @else
        <div class="absolute left-0 top-0 h-full w-full z-0 bg-gradient-to-br from-gray-900 to-black opacity-60"></div>
    @endif

    {{-- Overlay --}}
    <div class="relative z-10 flex h-full">

        {{-- Left Illustration --}}
        <div class="hidden md:flex items-center justify-center w-[50%] p-8">
            @if ($lightcone->background_image)
                <img src="{{ asset('storage/' . $lightcone->background_image) }}" class="h-[100%] object-contain drop-shadow-xl" />
            @endif
        </div>

        {{-- Right Content --}}
        <div class="w-full md:w-[50%] p-6 space-y-8 backdrop-blur-lg">

            {{-- Header Info --}}
            <div class="flex flex-col md:flex-row md:items-start justify-between top 10">
                <div>
                    <h1 class="text-4xl font-extrabold">{{ $lightcone->name }}</h1>
                    <div class="mt-3 flex items-center gap-2">
                        <img src="{{ asset('storage/assets/path/' . strtolower($lightcone->path) . '.webp') }}" class="w-8 h-8">
                        <span class="text-lg">{{ $lightcone->path }}</span>
                        <p class="text-yellow-400 text-xl mt-1">{{ str_repeat('★', $lightcone->rarity) }}</p>
                    </div>
                </div>

                {{-- Profile Image --}}
                <div class="mt-6 md:mt-0">
                    <img src="{{ asset('storage/' . $lightcone->image) }}" class="w-24 h-24 md:w-32 md:h-32 object-contain" />
                </div>
            </div>

            {{-- Detail --}}
            <div class="flex flex-col md:flex-row gap-8">
                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-6 mt-12 bg-gray-900 p-6 rounded-xl shadow">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('storage/assets/stats/hp.webp') }}" class="h-10">
                        <p><strong class="text-white">HP:</strong> {{ $lightcone->hp }}</p>
                    </div>

                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('storage/assets/stats/atk.webp') }}" class="h-10">
                        <p><strong class="text-white">ATK:</strong> {{ $lightcone->atk }}</p>
                    </div>

                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('storage/assets/stats/def.webp') }}" class="h-10">
                        <p><strong class="text-white">DEF:</strong> {{ $lightcone->def }}</p>
                    </div>
                </div>


                {{-- Description --}}
                <div class="text-sm text-gray-300 max-w-lg">
                    {{ $lightcone->description }}
                </div>
            </div>

            <!-- Superimposition Section -->
            <div x-data="{ level: 1 }" class="mt-8 space-y-4">
                <h3 class="text-2xl font-bold"> {{ $lightcone->superimposition_name }}</h3>

                <!-- Dropdown -->
                <div class="w-48">
                    <label for="superimposition-level" class="block mb-1 text-sm font-medium text-gray-300"></label>
                    <select id="superimposition-level" x-model="level"
                        class="w-full rounded bg-black/60 border border-gray-600 text-white p-2 focus:ring-yellow-500 focus:border-yellow-500">
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                        <option value="5">Level 5</option>
                    </select>
                </div>

                <!-- Display Selected Superimposition Effect -->
                <div class="bg-black/60 border border-gray-600 p-4 rounded-lg">
                    <template x-if="level == 1">
                        <p>{{ $lightcone->superimposition_lv1 }}</p>
                    </template>
                    <template x-if="level == 2">
                        <p>{{ $lightcone->superimposition_lv2 }}</p>
                    </template>
                    <template x-if="level == 3">
                        <p>{{ $lightcone->superimposition_lv3 }}</p>
                    </template>
                    <template x-if="level == 4">
                        <p>{{ $lightcone->superimposition_lv4 }}</p>
                    </template>
                    <template x-if="level == 5">
                        <p>{{ $lightcone->superimposition_lv5 }}</p>
                    </template>
                </div>
            </div>


            {{-- Story --}}
            @if($lightcone->story && is_array($lightcone->story))
                <div class="mt-6">
                    <h3 class="text-2xl font-bold mb-4"></h3>
                    <div class="grid grid-cols-1 gap-4 text-base text-gray-300">
                        @foreach($lightcone->story as $entry)
                            <div class= backdrop-blur-md p-4 rounded shadow">
                                <p>{{ $entry['text'] ?? $entry }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
