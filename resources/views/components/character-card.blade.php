@php
    $rarityColor = $character->rarity == 5 ? '#b88e63' : '#7c58ba';
@endphp

<div class="group relative rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400/50"
     style="background-color: {{ $rarityColor }}; width: 160px;">

    <a href="{{ route('characters.show', $character->id) }}" class="block">

        <!-- Character Image -->
        <div class="relative w-full aspect-[3/4] overflow-hidden">
            <img src="{{ asset('storage/' . $character->image) }}"
                 alt="{{ $character->name }}"
                 class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" />

            <!-- Rarity Stars Overlay -->
            <div class="absolute top-2 left-2">
                <div class="flex">
                    @for($i = 0; $i < $character->rarity; $i++)
                        <svg class="w-3 h-3 text-yellow-400 drop-shadow-md" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
            </div>

            <!-- Element Badge -->
            <div class="absolute top-2 right-2">
                <div class="w-8 h-8 bg-black/50 rounded-full p-1 backdrop-blur-sm">
                    <img src="{{ asset('storage/assets/elements/' . strtolower($character->element) . '.png') }}"
                         alt="{{ $character->element }}"
                         class="w-full h-full">
                </div>
            </div>

            <!-- Path Badge -->
            <div class="absolute bottom-2 right-2">
                <div class="w-8 h-8 bg-black/50 rounded-full p-1 backdrop-blur-sm">
                    <img src="{{ asset('storage/assets/path/' . strtolower($character->path) . '.webp') }}"
                         alt="{{ $character->path }}"
                         class="w-full h-full">
                </div>
            </div>

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <!-- Character Name -->
        <div class="bg-black/80 backdrop-blur-sm text-white text-center py-2 px-2">
            <h2 class="text-sm font-semibold leading-tight truncate group-hover:text-yellow-400 transition-colors duration-300">
                {{ $character->name }}
            </h2>
        </div>

        <!-- Hover Info -->
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <div class="text-center text-white p-4">
                <p class="text-xs text-gray-300 mb-1">{{ $character->element }}</p>
                <p class="text-sm font-medium text-yellow-400 mb-1">{{ $character->name }}</p>
                <p class="text-xs text-gray-300">{{ $character->path }}</p>
            </div>
        </div>
    </a>
</div>
