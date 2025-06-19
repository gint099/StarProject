@extends('layouts.app')

@section('content')
<div x-data="{ tab: 'detail' }" class="relative w-full min-h-screen overflow-hidden text-white">

    {{-- Background Image --}}
    @if ($character->background_image)
    <img src="{{ asset('storage/' . $character->background_image) }}"
        class="absolute left-0 top-0 h-full w-full sm:w-150 z-0 object-cover" />
    @else
        <div class="absolute left-0 top-0 h-full w-full z-0 bg-gradient-to-br from-gray-900 to-black opacity-60"></div>
    @endif

    <!-- Overlay Content -->
    <div class="relative z-10 flex h-full">

        <!-- Content Panel -->
        <div class="w-full transition-all duration-300 overflow-y-auto backdrop-blur-lg p-4 sm:p-6 lg:p-8"
             :class="(tab === 'skill' || tab === 'trace' || tab === 'eidolon' || tab === 'summon' || tab === 'story') ? 'md:w-full' : 'md:w-full lg:w-[48%] lg:ml-auto'">

            <!-- Character Info -->
            <div class="mb-6 relative">
                <!-- Profile image - responsive positioning -->
                @if ($character->profile_image)
                    <img src="{{ asset('storage/' . $character->profile_image) }}"
                         class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 object-contain border-2 border-white rounded-full
                                absolute right-0 top-0 sm:right-4 lg:right-10" />
                @endif

                <div class="pr-20 sm:pr-24 lg:pr-32">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold">{{ $character->name }}</h2>
                    <p class="text-yellow-400 text-lg sm:text-xl mt-2">{{ str_repeat('★', $character->rarity) }}</p>

                    <div class="mt-4 flex items-center gap-2 sm:gap-3 flex-wrap">
                        <img src="{{ asset('storage/assets/path/' . strtolower($character->path) . '.webp') }}" class="h-8 w-8 sm:h-10 sm:w-10">
                        <span class="text-sm sm:text-lg">{{ $character->path }}</span>
                        <img src="{{ asset('storage/assets/elements/' . strtolower($character->element) . '.png') }}" class="h-8 w-8 sm:h-10 sm:w-10">
                        <span class="text-sm sm:text-lg">{{ $character->element }}</span>
                    </div>
                </div>
            </div>

            <!-- Tabs - Responsive horizontal scroll -->
            <div class="mb-6">
                <div class="flex gap-3 sm:gap-6 border-b border-gray-600 pb-3 text-base sm:text-lg font-medium overflow-x-auto scrollbar-hide">
                    <!-- Detail Tab -->
                    <button @click="tab = 'detail'"
                            :class="{ 'border-b-2 border-yellow-400 text-yellow-400': tab === 'detail' }"
                            class="flex items-center gap-2 whitespace-nowrap flex-shrink-0 px-2">
                        <img src="{{ asset('storage/assets/icon/detail.webp') }}" class="h-8 w-8 sm:h-10 sm:w-10" alt="Detail Icon">
                        <span class="hidden sm:block" x-show="tab === 'detail'" x-transition>Detail</span>
                    </button>

                    <!-- Skill Tab -->
                    <button @click="tab = 'skill'"
                            :class="{ 'border-b-2 border-yellow-400 text-yellow-400': tab === 'skill' }"
                            class="flex items-center gap-2 whitespace-nowrap flex-shrink-0 px-2">
                        <img src="{{ asset('storage/assets/icon/skill.webp') }}" class="h-8 w-8 sm:h-10 sm:w-10" alt="Skill Icon">
                        <span class="hidden sm:block" x-show="tab === 'skill'" x-transition>Skill</span>
                    </button>

                    <!-- Trace Tab -->
                    <button @click="tab = 'trace'"
                            :class="{ 'border-b-2 border-yellow-400 text-yellow-400': tab === 'trace' }"
                            class="flex items-center gap-2 whitespace-nowrap flex-shrink-0 px-2">
                        <img src="{{ asset('storage/assets/icon/trace.webp') }}" class="h-8 w-8 sm:h-10 sm:w-10" alt="Trace Icon">
                        <span class="hidden sm:block" x-show="tab === 'trace'" x-transition>Trace</span>
                    </button>

                    <!-- Eidolon Tab -->
                    <button @click="tab = 'eidolon'"
                            :class="{ 'border-b-2 border-yellow-400 text-yellow-400': tab === 'eidolon' }"
                            class="flex items-center gap-2 whitespace-nowrap flex-shrink-0 px-2">
                        <img src="{{ asset('storage/assets/icon/eidolon.webp') }}" class="h-8 w-8 sm:h-10 sm:w-10" alt="Eidolon Icon">
                        <span class="hidden sm:block" x-show="tab === 'eidolon'" x-transition>Eidolon</span>
                    </button>

                    <!-- Summon Tab -->
                    @if (!empty($character->summons) && count($character->summons) > 0)
                        <button @click="tab = 'summon'"
                                :class="{ 'border-b-2 border-yellow-400 text-yellow-400': tab === 'summon' }"
                                class="flex items-center gap-2 whitespace-nowrap flex-shrink-0 px-2">
                            <img src="{{ asset('storage/assets/icon/summon.webp') }}" class="h-8 w-8 sm:h-10 sm:w-10" alt="Summon Icon">
                            <span class="hidden sm:block" x-show="tab === 'summon'" x-transition>Summon</span>
                        </button>
                    @endif

                    <!-- Story Tab -->
                    <button @click="tab = 'story'"
                            :class="{ 'border-b-2 border-yellow-400 text-yellow-400': tab === 'story' }"
                            class="flex items-center gap-2 whitespace-nowrap flex-shrink-0 px-2">
                        <img src="{{ asset('storage/assets/icon/story.webp') }}" class="h-8 w-8 sm:h-10 sm:w-10" alt="Story Icon">
                        <span class="hidden sm:block" x-show="tab === 'story'" x-transition>Story</span>
                    </button>
                </div>
            </div>

            <!-- Tab Contents -->
            <div class="space-y-8">
                <!-- Detail -->
                <div x-show="tab === 'detail'" x-transition class="w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mt-6 sm:mt-12 bg-gray-900/80 backdrop-blur-sm p-4 sm:p-6 rounded-xl shadow">
                        {{-- HP --}}
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            <img src="{{ asset('storage/assets/stats/hp.webp') }}" class="h-8 sm:h-10 flex-shrink-0">
                            <p class="text-white font-semibold text-sm sm:text-base">HP: {{ $character->hp }}</p>
                        </div>

                        {{-- ATK --}}
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            <img src="{{ asset('storage/assets/stats/atk.webp') }}" class="h-8 sm:h-10 flex-shrink-0">
                            <p class="text-white font-semibold text-sm sm:text-base">ATK: {{ $character->atk }}</p>
                        </div>

                        {{-- DEF --}}
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            <img src="{{ asset('storage/assets/stats/def.webp') }}" class="h-8 sm:h-10 flex-shrink-0">
                            <p class="text-white font-semibold text-sm sm:text-base">DEF: {{ $character->def }}</p>
                        </div>

                        {{-- SPD --}}
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            <img src="{{ asset('storage/assets/stats/spd.webp') }}" class="h-8 sm:h-10 flex-shrink-0">
                            <p class="text-white font-semibold text-sm sm:text-base">SPD: {{ $character->spd }}</p>
                        </div>

                        {{-- Taunt --}}
                        <div class="flex items-center space-x-2 sm:space-x-3 sm:col-span-2">
                            <img src="{{ asset('storage/assets/stats/atk.webp') }}" class="h-8 sm:h-10 flex-shrink-0">
                            <p class="text-white font-semibold text-sm sm:text-base">Taunt: {{ $character->taunt }}</p>
                        </div>
                    </div>
                </div>

                <!-- Skill -->
                <div x-show="tab === 'skill'" x-transition class="w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                        @foreach($character->skills as $skill)
                            <div class="bg-black/60 backdrop-blur-lg p-4 sm:p-6 rounded-lg shadow">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <img src="{{ asset('storage/' . $skill['image']) }}" class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded flex-shrink-0">
                                    <div class="min-w-0 flex-1">
                                        <strong class="text-lg sm:text-xl block">{{ $skill['name'] }}</strong>
                                        <p class="text-sm sm:text-base text-gray-200 mt-2 leading-relaxed">{{ $skill['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Summon -->
                <div x-show="tab === 'summon'" x-transition class="w-full">
                    @if (!empty($character->summons) && count($character->summons) > 0)
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 items-start">
                            {{-- Kolom 1-2: Daftar summon --}}
                            <div class="lg:col-span-2 space-y-4">
                                @foreach($character->summons as $summon)
                                    <div class="bg-black/60 backdrop-blur-lg p-4 sm:p-6 rounded-lg shadow">
                                        <div class="flex items-start gap-3 sm:gap-4">
                                            <img src="{{ asset('storage/' . $summon['image']) }}" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded flex-shrink-0">
                                            <div class="min-w-0 flex-1">
                                                <strong class="text-base sm:text-lg block">{{ $summon['name'] }}</strong>
                                                <p class="text-sm text-gray-200 mt-2 leading-relaxed">{{ $summon['description'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Kolom 3: Gambar summon di kanan --}}
                            @if ($character->summon_image)
                                <div class="flex flex-col items-center order-first lg:order-last">
                                    <img src="{{ asset('storage/' . $character->summon_image) }}"
                                        alt="Summon Image"
                                        class="w-24 h-24 sm:w-32 sm:h-32 object-cover rounded-full border-2 border-white shadow mb-2">
                                    <h3 class="text-lg sm:text-xl font-semibold text-center">{{ $character->summon_name }}</h3>
                                </div>
                            @endif
                        </div>
                    @else
                        <p class="text-gray-400 italic text-center py-8">No summons available for this character.</p>
                    @endif
                </div>

                <!-- Trace -->
                <div x-show="tab === 'trace'" x-transition class="w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                        @foreach($character->traces as $trace)
                            <div class="bg-black/60 backdrop-blur-lg p-4 sm:p-6 rounded-lg shadow">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <img src="{{ asset('storage/' . $trace['image']) }}" class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded flex-shrink-0">
                                    <div class="min-w-0 flex-1">
                                        <strong class="text-lg sm:text-xl block">{{ $trace['name'] }}</strong>
                                        <p class="text-sm sm:text-base text-gray-200 mt-2 leading-relaxed">{{ $trace['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Eidolon -->
                <div x-show="tab === 'eidolon'" x-transition class="w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                        @foreach($character->eidolons as $eidolon)
                            <div class="bg-black/60 backdrop-blur-lg p-4 sm:p-6 rounded-lg shadow">
                                <div class="flex items-start gap-3 sm:gap-4">
                                    <img src="{{ asset('storage/' . $eidolon['image']) }}" class="w-20 h-20 sm:w-32 sm:h-32 lg:w-40 lg:h-40 object-cover rounded flex-shrink-0">
                                    <div class="min-w-0 flex-1">
                                        <strong class="text-lg sm:text-xl block">{{ $eidolon['name'] }}</strong>
                                        <p class="text-sm sm:text-base text-gray-200 mt-2 leading-relaxed">{{ $eidolon['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Story -->
                <div x-show="tab === 'story'" x-transition class="w-full">
                    <div class="space-y-4 sm:space-y-6">
                        @foreach($character->story as $story)
                            <div class="bg-black/60 backdrop-blur-lg p-4 sm:p-6 rounded-lg shadow">
                                <h3 class="text-lg sm:text-xl font-semibold mb-3">{{ $story['title'] }}</h3>
                                <p class="text-sm sm:text-base text-gray-300 leading-relaxed">{{ $story['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Hide scrollbar for tabs */
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
</style>
@endsection
