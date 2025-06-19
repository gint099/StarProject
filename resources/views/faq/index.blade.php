@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="container mx-auto max-w-3xl py-6">
    <h2 class="text-3xl font-bold mb-6">Frequently Asked Questions</h2>

    <div class="space-y-4">
        @foreach($faqs as $index => $faq)
            <div x-data="{ open: false }" class="bg-gray-800 rounded-lg shadow">
                <button @click="open = !open" class="w-full text-left px-4 py-3 flex justify-between items-center hover:bg-gray-700">
                    <span class="text-lg font-semibold">{{ $faq['question'] }}</span>
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.832.445l5 7a1 1 0 01-1.664 1.11L10 5.882 5.832 11.555a1 1 0 11-1.664-1.11l5-7A1 1 0 0110 3z" clip-rule="evenodd" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform rotate-180" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.832.445l5 7a1 1 0 01-1.664 1.11L10 5.882 5.832 11.555a1 1 0 11-1.664-1.11l5-7A1 1 0 0110 3z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" x-transition x-cloak class="px-4 pb-4">
                    <p class="text-sm text-gray-300">{{ $faq['answer'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
