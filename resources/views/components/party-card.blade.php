@php
    $typeColors = [
        'Meta' => '#FFD700',
        'F2P' => '#32CD32',
        'Budget' => '#87CEEB',
        'Hypercarry' => '#FF6347',
        'DoT' => '#9370DB',
        'Follow-up' => '#FF69B4',
        'Break' => '#FFA500',
        'Sustain' => '#20B2AA'
    ];
    $cardColor = $typeColors[$party->type] ?? '#6B7280';
@endphp

<div class="group relative rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-yellow-400/50 bg-gray-900">

    <a href="{{ route('parties.character', $party->dps->id) }}" class="block">

        <!-- DPS Character Image -->
        <div class="relative w-full h-48 overflow-hidden bg-gray-800">
            <img src="{{ asset('storage/' . $party->dps->image) }}"
                 alt="{{ $party->dps->name }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>

            <!-- DPS Info -->
            <div class="absolute bottom-3 left-3 right-3">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-white font-bold text-lg leading-tight">{{ $party->dps->name }}</h3>
                        <p class="text-gray-300 text-sm">Main</p>
                    </div>
                    <div class="flex gap-2">
                        <!-- Element -->
                        <div class="w-8 h-8 bg-black/50 rounded-full p-1 backdrop-blur-sm">
                            <img src="{{ asset('storage/assets/elements/' . strtolower($party->dps->element) . '.png') }}"
                                 alt="{{ $party->dps->element }}"
                                 class="w-full h-full">
                        </div>
                        <!-- Path -->
                        <div class="w-8 h-8 bg-black/50 rounded-full p-1 backdrop-blur-sm">
                            <img src="{{ asset('storage/assets/path/' . strtolower($party->dps->path) . '.webp') }}"
                                 alt="{{ $party->dps->path }}"
                                 class="w-full h-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <div class="text-center text-white p-4">
                <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <p class="text-lg font-bold text-yellow-400 mb-1">{{ $party->name }}</p>
                <p class="text-xs text-gray-400 mt-2">Click to view details</p>
            </div>
        </div>
    </a>
</div>
