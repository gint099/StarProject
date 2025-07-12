@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-white mb-2">Party Compositions</h1>
        <p class="text-gray-400">Explore optimized team compositions</p>
    </div>

    @php
        $types = ['Meta', 'F2P', 'Budget', 'Hypercarry', 'DoT', 'Follow-up', 'Break', 'Sustain'];
        $paths = ['Destruction','Hunt','Erudition','Harmony','Nihility','Preservation','Abundance','Remembrance'];
        $elements = ['Physical','Fire','Ice','Lightning','Wind','Quantum','Imaginary'];
    @endphp

    <!-- Party Cards -->
    @php
        $count = $parties->count();
    @endphp

    @if($count > 0)
        <div class="mb-4">
            <p class="text-gray-400 text-center">
                Showing {{ $count }} part{{ $count > 1 ? 'ies' : 'y' }}
                @if(request()->hasAny(['type', 'dps_path', 'dps_element']))
                    with applied filters
                @endif
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($parties as $party)
                @include('components.party-card', ['party' => $party])
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-lg mb-4">No parties found</div>
            <a href="{{ route('parties.index') }}"
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
