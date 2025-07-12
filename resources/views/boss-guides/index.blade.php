@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-white mb-2">Boss Collection</h1>
        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($bosses as $boss)
            <a href="{{ route('boss-guides.show', $boss->id) }}"
               class="group relative bg-gradient-to-br from-blue-900 to-blue-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 border border-blue-700/50">
                <div class="relative">
                    <img src="{{ asset('storage/' . $boss->image) }}"
                         alt="{{ $boss->name }}"
                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="font-bold text-sm">{{ $boss->name }}</h3>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
