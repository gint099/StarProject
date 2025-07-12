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

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-white mb-2">{{ $character->name }}'s Parties</h1>
        <p class="text-gray-400">Party compositions featuring {{ $character->name }}</p>
    </div>

    <!-- Parties List -->
    <div class="space-y-6">
        @foreach($parties as $party)
        <div class="bg-gray-800 rounded-xl shadow-lg border border-gray-700 overflow-hidden">
            <!-- Party Header -->
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4 border-b border-gray-700">
                <h2 class="text-xl font-semibold text-white">{{ $party->name }}</h2>
                <span class="inline-block bg-yellow-400/20 text-yellow-400 px-3 py-1 rounded-full text-sm font-medium mt-2">
                    {{ $party->type }}
                </span>
            </div>

            <!-- Party Members -->
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                    @foreach([
                        'DPS' => $party->dps,
                        'Sub DPS' => $party->subDps,
                        'Support' => $party->support,
                        'Sustain' => $party->sustain,
                    ] as $role => $char)
                        @if($char)
                        <div class="text-center group">
                            <div class="relative mb-3">
                                <img src="{{ asset("storage/" . $char->image) }}"
                                     class="w-20 h-20 mx-auto rounded-full border-2 border-gray-600 group-hover:border-yellow-400 transition-colors duration-300"
                                     alt="{{ $char->name }}">
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-bold text-gray-900">{{ substr($role, 0, 1) }}</span>
                                </div>
                            </div>
                            <p class="text-sm text-yellow-300 font-semibold mb-1">{{ $role }}</p>
                            <p class="text-white text-sm font-medium">{{ $char->name }}</p>
                        </div>
                        @endif
                    @endforeach
                </div>

                <!-- Party Description -->
                @if ($party->description)
                <div class="bg-gray-900 rounded-lg p-4 border border-gray-700">
                    <h3 class="text-sm font-semibold text-yellow-400 mb-2">Description</h3>
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
