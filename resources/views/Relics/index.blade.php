@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Relic</h2>

@php
    $rarities = [5, 4];
    $types = ['relic' => 'Relic Set', 'planar' => 'Planar Ornament'];
@endphp

{{-- Filter Form --}}
<form method="GET" class="mb-6">
    <div class="flex flex-col items-center gap-4">

        <!-- Filter Type -->
        <div class="flex justify-center gap-2">
            <!-- Tombol untuk menampilkan semua -->
            <button type="submit" name="type" value=""
                class="px-3 py-1 rounded text-sm font-semibold {{ request('type') === '' || request('type') === null ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-white' }}">
                All
            </button>

            @foreach($types as $key => $label)
                <button type="submit" name="type" value="{{ $key }}"
                    class="px-3 py-1 rounded text-sm font-semibold {{ request('type') === $key ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-white' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <!-- Filter Rarity (Opsional) -->
        {{-- <div class="flex justify-center gap-2">
            <span class="text-sm text-gray-300 mr-2">Rarity:</span>

            <!-- Tombol untuk menampilkan semua rarity -->
            <button type="submit" name="rarity" value=""
                class="px-3 py-1 rounded text-sm font-semibold {{ request('rarity') === '' || request('rarity') === null ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-white' }}">
                All
            </button>

            @foreach($rarities as $rarity)
                <button type="submit" name="rarity" value="{{ $rarity }}"
                    class="px-3 py-1 rounded text-sm font-semibold {{ request('rarity') == $rarity ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-white' }}">
                    {{ $rarity }}★
                </button>
            @endforeach
        </div> --}}

        <!-- Preserve existing filters -->
        @if(request('type'))
            <input type="hidden" name="type_preserve" value="{{ request('type') }}">
        @endif
        @if(request('rarity'))
            <input type="hidden" name="rarity_preserve" value="{{ request('rarity') }}">
        @endif
    </div>
</form>

{{-- Display current filters --}}
@if(request()->hasAny(['type', 'rarity']))
    <div class="mb-4 text-center">
        <span class="text-sm text-gray-400">
            Showing:
            @if(request('type'))
                {{ $types[request('type')] ?? 'Unknown Type' }}
            @endif
            @if(request('type') && request('rarity'))
                ,
            @endif
            @if(request('rarity'))
                {{ request('rarity') }}★
            @endif
        </span>
        <a href="{{ route('relics.index') }}" class="ml-2 text-xs text-blue-400 hover:text-blue-300">
            Clear Filters
        </a>
    </div>
@endif

{{-- Grid Relics --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 px-4">
    @forelse($relics as $relic)
        @include('components.relic-card', ['relic' => $relic])
    @empty
        <p class="text-center text-gray-400 col-span-2">No relics found matching your criteria.</p>
    @endforelse
</div>

{{-- Show total count --}}
<div class="mt-6 text-center text-sm text-gray-400">
    Showing {{ $relics->count() }} relic(s)
</div>
@endsection
