@php
    $isRelic = $relic->type === 'relic';
@endphp

<div class="bg-rgba(34,34,34,.9) text-white rounded-lg shadow-md p-4 flex gap-4 hover:scale-105">
    {{-- Set Icon --}}
    <div class="flex-shrink-0 w-20 h-20">
            <img src="{{ asset('storage/' . $relic->image) }}" alt="{{ $relic->name }}" class="rounded w-full h-full object-cover">
        </a>
    </div>

     {{-- Info --}}
     <div class="flex flex-col flex-grow">
        <p class="text-sm text-gray-300">{{ $isRelic ? 'Set Relic' : 'Planar Ornament' }}</p>
            <h3 class="text-lg font-semibold">{{ $relic->name }}</h3>
        </a>

        {{-- Part Images --}}
        <div class="flex gap-2 mt-1">
            @if ($isRelic)
                @foreach (['body', 'head', 'hand', 'boots'] as $part)
                    @php $imageField = $part . '_image'; @endphp
                    @if ($relic->$imageField)
                        <img src="{{ asset('storage/' . $relic->$imageField) }}" alt="{{ $part }}" class="w-10 h-10 ">
                    @endif
                @endforeach
            @else
                @foreach (['planar', 'rope'] as $part)
                    @php $imageField = $part . '_image'; @endphp
                    @if ($relic->$imageField)
                        <img src="{{ asset('storage/' . $relic->$imageField) }}" alt="{{ $part }}" class="w-10 h-10 ">
                    @endif
                @endforeach
            @endif
        </div>

        {{-- Bonus Descriptions --}}
        <div class="mt-2 text-l ">
            <p><span class="text-yellow-300 font-bold">2</span> {{ $relic->set_bonus_2 }}</p>
            @if ($isRelic && $relic->set_bonus_4)
                <p><span class="text-yellow-300 font-bold">4</span> {{ $relic->set_bonus_4 }}</p>
            @endif
        </div>
    </div>
</div>
