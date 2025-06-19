<!-- resources/views/characters/index.blade.php -->
@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 justify-center">Characters</h2>

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
@php
    $count = $characters->count();
@endphp
<div class="w-full flex justify-center">
    <div class="w-full flex flex-wrap justify-center gap-4">
        @foreach($characters as $character)
            @include('components.character-card', ['character' => $character])
        @endforeach
    </div>

</div>

@endsection
