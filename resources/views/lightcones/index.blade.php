@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Light Cones</h2>

@php
    $paths = ['Destruction','Hunt','Erudition','Harmony','Nihility','Preservation','Abundance', 'Remembrance'];
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
        <a href="{{ route('lightcones.index') }}" class="mt-2 text-sm text-gray-400 hover:text-white">Reset Filter</a>
    </div>
</form>

{{-- Lightcone Cards --}}
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Grid dengan ukuran card yang konsisten -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 justify-items-center">
        @foreach($lightcones as $lightcone)
            @include('components.lightcone-card', ['lightcone' => $lightcone])
        @endforeach
    </div>
</div>

@endsection
