@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Logo dan Navigasi Atas --}}
    <div class="flex justify-center mt-10">
        <img src="{{ asset('storage/assets/icon/logo.png') }}" alt="Star Project" class="h-32">
    </div>

    {{-- Text --}}
    <h1 class="text-5xl font-bold mt-10 mb-4 flex justify-center">Explore the Star Rail Universe</h1>

    {{-- Berita Terbaru --}}
    <h2 class="text-2xl font-bold mt-10 mb-4 flex justify-center">News</h2>

    @isset($latestNews)
        <div class="mb-10">
            <a href="{{ $latestNews->link }}">
                <img src="{{ asset('storage/' . $latestNews->image) }}" class="w-full h-64 object-cover rounded-xl" alt="{{ $latestNews->title }}">
            </a>
        </div>
    @endisset

    {{-- Featured News Slider --}}
    @if ($featuredNews->count())
        <div
            x-data="{
                active: 0,
                items: {{ $featuredNews->count() }},
                start() {
                    setInterval(() => {
                        this.active = (this.active + 1) % this.items;
                    }, 4000); // transisi lebih lambat
                }
            }"
            x-init="start()"
            class="relative w-full max-w-3xl mx-auto rounded-xl overflow-hidden"
            style="min-height: 16rem"
        >
            @foreach ($featuredNews as $index => $item)
                <div
                    x-show="active === {{ $index }}"
                    x-transition:enter="transition-opacity duration-1000"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    class="absolute inset-0"
                >
                    <a href="{{ $item->link }}">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-64 object-cover rounded-xl" alt="{{ $item->title }}">
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Footer --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12 bg-gray-900 p-6 rounded-xl shadow">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('storage/assets/icon/chibi.png') }}" class="h-10">
            <div>
                <p class="text-white font-semibold">Media sosial kami</p>
                <div class="flex space-x-3 mt-1">
                    <a href="https://discord.gg/srs" target="_blank">
                        <img src="{{ asset('storage/assets/icon/discord.svg') }}" class="h-6">
                    </a>
                    <a href="https://twitter.com" target="_blank">
                        <img src="{{ asset('storage/assets/icon/twiter.svg') }}" class="h-6">
                    </a>
                </div>
            </div>
        </div>
        <div class="text-sm text-gray-400">
            Basis Data buatan penggemar untuk pemain Honkai: Star Rail.<br>
            Aset game dimiliki COGNOSPHERE PTE. LTD.<br>
            <a href="#" class="text-green-400 underline">Kebijakan Privasi</a>
        </div>
    </div>

</div>
@endsection
