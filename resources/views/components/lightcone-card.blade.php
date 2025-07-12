@php
    $rarityColor = $lightcone->rarity == 5 ? '#b88e63' : '#7c58ba';
@endphp

<div class="relative rounded-xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-200 border border-white/10"
     style="background: linear-gradient(135deg, {{ $rarityColor }}, {{ $rarityColor }}dd); width: 240px; height: 96px;">

    <a href="{{ route('lightcones.show', $lightcone->id) }}" class="flex items-center w-full h-full backdrop-blur-sm">
        <!-- Image Section -->
        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $lightcone->image) }}"
                 alt="{{ $lightcone->name }}"
                 class="w-20 h-24 object-cover">
        </div>

        <!-- Content Section -->
        <div class="flex-1 px-3 py-2 text-white min-w-0 h-full flex flex-col justify-center">
            <!-- Path Icon -->
            <div class="flex items-center mb-1">
                <img src="{{ asset('storage/assets/path/' . strtolower($lightcone->path) . '.webp') }}"
                     alt="{{ $lightcone->path }}"
                     class="w-8 h-8 flex-shrink-0">
            </div>

            <!-- Name dengan tinggi tetap -->
            <div class="h-10 flex items-start">
                <h3 class="text-sm font-semibold leading-tight text-white break-words overflow-hidden"
                    style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; word-break: break-word;">
                    {{ $lightcone->name }}
                </h3>
            </div>
        </div>
    </a>

</div>
