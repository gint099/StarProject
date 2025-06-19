
@php
    $rarityColor = $lightcone->rarity == 5 ? '#b88e63' : '#7c58ba';
@endphp

<div class="relative rounded-lg overflow-hidden shadow-md hover:scale-105 transition border border-gray-700"
     style="background-color: {{ $rarityColor }}; width: 160px;">

    <a href="{{ route('lightcones.show', $lightcone->id) }}" class="block">

        {{-- Gambar Lightcone --}}
        <div class="relative w-full aspect-[3/4]">
            <img src="{{ asset('storage/' . $lightcone->image) }}"
                 alt="{{ $lightcone->name }}"
                 class="w-full h-full object-contain" />
        </div>

        {{-- Nama Lightcone --}}
        <div class="bg-black/70 text-white text-center py-1 px-2">
            <img src="{{ asset('storage/assets/path/' . strtolower($lightcone->path) . '.webp') }}" alt="{{ $lightcone->path }}" class="w-8 h-8 flex-center mx-auto mb-1">
            <h2 class="text-sm font-semibold leading-tight truncate">{{ $lightcone->name }}</h2>
        </div>
    </a>
</div>
