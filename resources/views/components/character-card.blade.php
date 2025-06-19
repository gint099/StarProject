@php
    $rarityColor = $character->rarity == 5 ? '#b88e63' : '#7c58ba';
@endphp

<div class="relative rounded-lg overflow-hidden shadow-md hover:scale-105 transition border border-black-700"
     style="background-color: {{ $rarityColor }}; width: 160px;">

    <a href="{{ route('characters.show', $character->id) }}" class="block">

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
    </a>
</div>
