@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- Navigation -->
    <nav class="mb-6">
        <a href="{{ route('parties.index') }}"
           class="inline-flex items-center text-yellow-400 hover:text-yellow-300 transition-colors duration-200">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Parties
        </a>
    </nav>

    <!-- Character Header -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 rounded-xl p-6 mb-8 border border-gray-700">
        <div class="flex items-center gap-6">
            <!-- Character Image -->
            <div class="relative">
                <img src="{{ asset('storage/' . $character->profile_image) }}"
                     alt="{{ $character->name }}"
                     class="w-24 h-24 rounded-full border-4 border-yellow-400 shadow-lg">
            </div>

            <!-- Character Info -->
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-white mb-2">{{ $character->name }}</h1>
                <div class="flex items-center gap-4 text-gray-300">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('storage/assets/path/' . strtolower($character->path) . '.webp') }}"
                             alt="{{ $character->path }}"
                             class="w-10 h-10">
                        <span class="text-sm">{{ $character->path }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('storage/assets/elements/' . strtolower($character->element) . '.png') }}"
                             alt="{{ $character->element }}"
                             class="w-10 h-10">
                        <span class="text-sm">{{ $character->element }}</span>
                    </div>
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < $character->rarity; $i++)
                            <svg class="w-10 h-10 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Party Count -->
            <div class="text-center">
                <div class="text-3xl font-bold text-yellow-400">{{ $parties->count() }}</div>
                <div class="text-sm text-gray-400">Part{{ $parties->count() > 1 ? 'ies' : 'y' }}</div>
            </div>
        </div>
    </div>

    <!-- Parties Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach($parties as $party)
        <div class="party-card bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden hover:border-yellow-400/50 transition-all duration-300"
             data-type="{{ strtolower($party->type) }}">

            <!-- Party Header -->
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4 border-b border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white mb-1">{{ $party->name }}</h2>
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold text-black bg-yellow-400">
                            {{ $party->type }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Party Members -->
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    @foreach([
                        'DPS' => $party->dps,
                        'Sub DPS' => $party->subDps,
                        'Support' => $party->support,
                        'Sustain' => $party->sustain,
                    ] as $role => $char)
                        @if($char)
                        <div class="group text-center">
                            <div class="relative mb-3">
                                <a href="{{ route('characters.show', $character->id) }}" class="block">
                                    <img src="{{ asset('storage/' . $char->profile_image) }}"
                                        alt="{{ $char->name }}"
                                        class="w-16 h-16 mx-auto rounded-full border-2 border-gray-600 group-hover:border-yellow-400 transition-all duration-300 group-hover:scale-105">

                                    <!-- Element Badge -->
                                    <div class="absolute -top-1 -left-2 w-10 h-10 bg-gray-900 rounded-full p-0.5 border border-gray-700">
                                        <img src="{{ asset('storage/assets/elements/' . strtolower($char->element) . '.png') }}"
                                            alt="{{ $char->element }}"
                                            class="w-full h-full">
                                    </div>
                                </a>
                            </div>

                            <p class="text-xs text-yellow-300 font-semibold mb-1">{{ $role }}</p>
                            <p class="text-sm text-white font-medium leading-tight">{{ $char->name }}</p>
                        </div>
                        @endif
                    @endforeach
                </div>

                <!-- Party Description -->
                @if ($party->description)
                <div class="bg-gray-900 rounded-lg p-4 border border-gray-700">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-sm font-semibold text-yellow-400">Strategy & Usage</h3>
                    </div>
                    <div class="text-gray-300 text-sm leading-relaxed whitespace-pre-line">
                        {{ $party->description }}
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
