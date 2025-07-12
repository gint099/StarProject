@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    @php
        $paths = ['Destruction','Hunt','Erudition','Harmony','Nihility','Preservation','Abundance','Remembrance'];
        $elements = ['Physical','Fire','Ice','Lightning','Wind','Quantum','Imaginary'];
        $rarities = [5, 4];
    @endphp

    <!-- Filter Form -->
    <form method="GET" class="mb-8">
        <div ">
            <div class="flex flex-col items-center gap-6">

                <!-- Filter Paths -->
                <div class="w-full">
                    <div class="flex flex-wrap justify-center gap-3">
                        @foreach($paths as $path)
                            <button type="submit" name="path" value="{{ $path }}"
                                class="group relative p-2 rounded-lg bg-gray-700 hover:bg-gray-600 transition-all duration-200 {{ request('path') === $path ? 'ring-2 ring-yellow-400 bg-yellow-400/20' : '' }}">
                                <img src="{{ asset('storage/assets/path/' . $path . '.webp') }}"
                                     alt="{{ $path }}"
                                     class="w-10 h-10 group-hover:scale-110 transition-transform duration-150">
                                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <span class="text-xs text-gray-300 bg-gray-900 px-2 py-1 rounded whitespace-nowrap">{{ $path }}</span>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Filter Elements -->
                <div class="w-full">
                    <div class="flex flex-wrap justify-center gap-3">
                        @foreach($elements as $element)
                            <button type="submit" name="element" value="{{ $element }}"
                                class="group relative p-2 rounded-lg bg-gray-700 hover:bg-gray-600 transition-all duration-200 {{ request('element') === $element ? 'ring-2 ring-yellow-400 bg-yellow-400/20' : '' }}">
                                <img src="{{ asset('storage/assets/elements/' . $element . '.png') }}"
                                     alt="{{ $element }}"
                                     class="w-8 h-8 group-hover:scale-110 transition-transform duration-150">
                                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <span class="text-xs text-gray-300 bg-gray-900 px-2 py-1 rounded whitespace-nowrap">{{ $element }}</span>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Filter Rarity -->
                <div class="w-full">
                    <div class="flex justify-center gap-3">
                        @foreach($rarities as $rarity)
                            <button type="submit" name="rarity" value="{{ $rarity }}"
                                class="group relative p-2 rounded-lg bg-gray-700 hover:bg-gray-600 transition-all duration-200 {{ request('rarity') == $rarity ? 'ring-2 ring-yellow-400 bg-yellow-400/20' : '' }}">
                                <img src="{{ asset('storage/assets/rarity/' . $rarity . 'star.png') }}"
                                     alt="{{ $rarity }}★"
                                     class="w-8 h-8 group-hover:scale-110 transition-transform duration-150">
                                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <span class="text-xs text-gray-300 bg-gray-900 px-2 py-1 rounded whitespace-nowrap">{{ $rarity }} Stars</span>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Reset Button -->
                <a href="{{ route('characters.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-sm text-gray-300 hover:text-white transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Reset Filter
                </a>
            </div>
        </div>
    </form>

    <!-- Character Cards -->
    @php
        $count = $characters->count();
    @endphp

    @if($count > 0)
        <div class="mb-4">
            <p class="text-gray-400 text-center">
                Showing {{ $count }} character{{ $count > 1 ? 's' : '' }}
                @if(request()->hasAny(['path', 'element', 'rarity']))
                    with applied filters
                @endif
            </p>
        </div>

        <div class="flex justify-center">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7 gap-4">
                @foreach($characters as $character)
                    @include('components.character-card', ['character' => $character])
                @endforeach
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-lg mb-4">No characters found</div>
            <a href="{{ route('characters.index') }}"
               class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-500 rounded-lg text-gray-900 font-medium transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Clear Filters
            </a>
        </div>
    @endif

</div>
@endsection
