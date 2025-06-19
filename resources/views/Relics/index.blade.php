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
            @foreach($types as $key => $label)
                <button type="submit" name="type" value="{{ $key }}"
                    class="px-3 py-1 rounded text-sm font-semibold {{ request('type') === $key ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-white' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>
</form>

{{-- Grid Relics --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 px-4 ">
    @forelse($relics as $relic)
        @include('components.relic-card', ['relic' => $relic])
    @empty
        <p class="text-center text-gray-400 col-span-2">No relics found.</p>
    @endforelse
</div>
@endsection
