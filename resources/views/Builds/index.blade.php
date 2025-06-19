@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 flex justify-center">Tips & Builds</h2>

@php
    $paths = ['Destruction','Hunt','Erudition','Harmony','Nihility','Preservation','Abundance','Remembrance'];
    $elements = ['Physical','Fire','Ice','Lightning','Wind','Quantum','Imaginary'];
    $rarities = [5, 4];
@endphp

{{-- Filter Form --}}
<form method="GET" class="mb-6">
    <div class="flex flex-col items-center gap-4">
        <!-- Filter Paths -->
        <div class="flex flex-wrap justify-center gap-2 ">
            @foreach($paths as $path)
                <button type="submit" name="path" value="{{ $path }}"
                    class="rounded {{ request('path') === $path ? 'ring-2 ring-yellow-400' : '' }}">
                    <img src="{{ asset('storage/assets/path/' . $path . '.webp') }}" alt="{{ $path }}" class="w-12 h-12 hover:scale-110 transition-transform duration-150">
                </button>
            @endforeach
        </div>

        <!-- Filter Elements -->
        <div class="flex flex-wrap justify-center gap-2">
            @foreach($elements as $element)
                <button type="submit" name="element" value="{{ $element }}"
                    class="rounded {{ request('element') === $element ? 'ring-2 ring-yellow-400' : '' }}">
                    <img src="{{ asset('storage/assets/elements/' . $element . '.png') }}" alt="{{ $element }}" class="w-10 h-10 hover:scale-110 transition-transform duration-150">
                </button>
            @endforeach
        </div>

        <!-- Filter Rarity -->
        <div class="flex justify-center gap-2">
            @foreach($rarities as $rarity)
                <button type="submit" name="rarity" value="{{ $rarity }}"
                    class="rounded {{ request('rarity') == $rarity ? 'ring-2 ring-yellow-400' : '' }}">
                    <img src="{{ asset('storage/assets/rarity/' . $rarity . 'star.png') }}" alt="{{ $rarity }}★" class="w-10 h-10 hover:scale-110 transition-transform duration-150">
                </button>
            @endforeach
        </div>

        <!-- Reset Button -->
        <a href="{{ route('characters.index') }}" class="mt-2 text-sm text-gray-400 hover:text-white">Reset Filter</a>
    </div>
</form>

{{-- Character Cards --}}
<div class="w-full flex justify-center">
    <div class="w-full flex flex-wrap justify-center gap-4">
        @foreach($characters as $character)
            @php
                $build = \App\Models\Build::where('character_id', $character->id)->first();
            @endphp

            <div class="relative rounded-lg overflow-hidden shadow-md hover:scale-105 transition border border-black-700"
                 style="background-color: {{ $character->rarity == 5 ? '#b88e63' : '#7c58ba' }}; width: 160px;">

                @if ($build)
                    <a href="{{ route('builds.show', $build->id) }}" class="block">
                @else
                    <div class="block opacity-50 cursor-not-allowed">
                @endif

                        {{-- Gambar karakter --}}
                        <div class="relative w-full aspect-[3/4]">
                            <img src="{{ asset('storage/' . $character->image) }}"
                                alt="{{ $character->name }}"
                                class="w-full h-full object-contain" />

                            {{-- Element kiri atas --}}
                            <div class="absolute top-40.5 left-1.5 p-0.5 rounded">
                                <img src="{{ asset('storage/assets/elements/' . strtolower($character->element) . '.png') }}" alt="{{ $character->element }}" class="w-8 h-8">
                            </div>

                            {{-- Path kanan atas --}}
                            <div class="absolute top-40.5 right-1.5 p-0.5 rounded">
                                <img src="{{ asset('storage/assets/path/' . strtolower($character->path) . '.webp') }}" alt="{{ $character->path }}" class="w-8 h-8">
                            </div>
                        </div>

                        {{-- Nama karakter --}}
                        <div class="bg-black/70 text-white text-center py-1 px-2">
                            <h2 class="text-sm font-semibold leading-tight truncate">{{ $character->name }}</h2>
                        </div>

                @if ($build)
                    </a>
                @else
                    </div>
                @endif

            </div>
        @endforeach
    </div>
</div>
@endsection
