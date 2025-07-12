@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Build Title -->
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-extrabold text-white tracking-wide">{{ $build->name }}</h1>
        <p class="text-yellow-400 text-2xl mt-1">{{ str_repeat('★', $build->character->rarity) }}</p>
    </div>

    <div class="grid grid-cols-12 gap-6">
        <!-- Left Side - Character Image -->
        <div class="col-span-12 lg:col-span-6">
            <div class="relative bg-gradient-to-b rounded-lg overflow-hidden mb-4" style="min-height: 400px;">
                @if($build->character->background_image)
                    <img src="{{ asset('storage/' . $build->character->background_image) }}"
                         alt="{{ $build->character->name }}"
                         class="w-full h-full object-cover">
                @endif
            </div>

            <div class="flex justify-center gap-4 mb-4">
                <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center">
                    <img src="{{ asset('storage/assets/path/' . $build->character->path . '.webp') }}"
                         alt="{{ $build->character->path }}"
                         class="w-16 h-16">
                </div>
                <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center">
                    <img src="{{ asset('storage/assets/elements/' . $build->character->element . '.png') }}"
                         alt="{{ $build->character->element }}"
                         class="w-16 h-16">
                </div>
            </div>

            <div class="flex justify-center gap-2">
                @php
                    $stats = [
                        ['key' => 'spd', 'label' => 'spd', 'value' => $build->spd_value],
                        ['key' => 'cr', 'label' => 'cr', 'value' => $build->cr_value],
                        ['key' => 'cd', 'label' => 'cd', 'value' => $build->cd_value],
                        ['key' => 'err', 'label' => 'err', 'value' => $build->er_value],
                        ['key' => 'hr', 'label' => 'hr', 'value' => $build->hr_value],
                        ['key' => 'be', 'label' => 'be', 'value' => $build->be_value]
                    ];
                @endphp

                @foreach($stats as $stat)
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center">
                            <img src="{{ asset('storage/assets/stats/' . $stat['key'] . '.webp') }}"
                                 alt="{{ $stat['key'] }}"
                                 class="w-16 h-16">
                        </div>
                        <span class="text-white text-l">{{ $stat['value'] ?? 0 }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-span-12 lg:col-span-6 space-y-6">
            <!-- Lightcones -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-4 border-b-2 border-yellow-500 pb-2">Recommended Lightcones</h3>
                <div class="flex flex-wrap gap-4">
                    @foreach($build->lightcones as $lightcone)
                        @php
                            $rarityColor = $lightcone->rarity == 5 ? '#b88e63' : '#7c58ba';
                        @endphp
                        <div class="relative rounded-lg overflow-hidden shadow-md hover:scale-105 transition border border-gray-700"
                             style="background-color: {{ $rarityColor }}; width: 160px;">
                            <a href="{{ route('lightcones.show', $lightcone->id) }}" class="block">
                                @if($lightcone->image)
                                    <img src="{{ asset('storage/' . $lightcone->image) }}"
                                         alt="{{ $lightcone->name }}"
                                         class="w-full h-full object-cover rounded-t-md" />
                                    <div class="bg-black/70 text-white text-center py-1 px-2">
                                        <h2 class="text-sm font-semibold leading-tight truncate">{{ $lightcone->name }}</h2>
                                    </div>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Main Stats -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-4 border-b-2 border-yellow-500 pb-2">Main Stats</h3>
                <div class="grid grid-cols-2 gap-4">
                    @php
                        $mainStats = [
                            ['position' => 'body', 'label' => 'Body', 'value' => $build->body_main_stat ?? 'HP%'],
                            ['position' => 'boots', 'label' => 'Boots', 'value' => $build->boots_main_stat ?? 'SPD'],
                            ['position' => 'planar', 'label' => 'Planar', 'value' => $build->planar_main_stat ?? 'HP%'],
                            ['position' => 'rope', 'label' => 'Rope', 'value' => $build->rope_main_stat ?? 'Energy Regeneration Rate']
                        ];
                    @endphp

                    @foreach($mainStats as $mainStat)
                    <div class="flex items-center gap-4 bg-gray-800 p-4 rounded-2xl shadow">
                        <img src="{{ asset('storage/assets/relics/slot/' . $build->getSlotImage($mainStat['position'])) }}"
                            alt="{{ $mainStat['label'] }}"
                            class="w-14 h-14 rounded-full">
                        {{-- <img src="{{ asset('storage/' . $build->getMainStatImage($mainStat['position'])) }}"
                            alt="{{ $mainStat['value'] }}"
                            class="w-14 h-14 rounded-full"> --}}
                        <span class="text-white font-semibold">{{ $mainStat['value'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Substats -->
            <div>
                <h3 class="text-2xl font-bold text-white mb-4 border-b-2 border-yellow-500 pb-2">Substat</h3>
                <div class="flex gap-2">
                    @foreach($build->substats_data as $substat)
                        <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center">
                            <img src="{{ asset("storage/" . $substat['image']) }}"
                                 alt="{{ $substat['type'] }}"
                                 class="w-16 h-16">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="mt-8 grid grid-cols-12 gap-6">
        <!-- Recommended Eidolon -->
        <div class="col-span-12 lg:col-span-3">
            <h3 class="text-2xl font-bold text-white mb-4 border-b-2 border-yellow-500 pb-2">Recomend Eidolon</h3>
            <div class="text-white p-6 rounded-lg text-center" style="min-height: 200px;">
                @php
                    $eidolon = $build->character->eidolons[$build->eidolon_level - 1] ?? null;
                @endphp

                @if($eidolon)
                    <img src="{{ asset('storage/' . $eidolon['image']) }}"
                        alt="{{ $eidolon['name'] }}"
                        class="w-full h-full object-cover rounded mb-4">
                @endif

                <div class="mt-4">
                    <p class="text-l font-bold">Eidolon {{ $build->eidolon_level ?? 0 }}</p>
                    @if($build->eidolon_data)
                        <p class="text-l font-bold mt-2">{{ $build->eidolon_data['name'] ?? '' }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Relic Sets -->
        <div class="col-span-12 lg:col-span-3">
            <h3 class="text-2xl font-bold text-white mb-4 border-b-2 border-yellow-500 pb-2">Relic Sets</h3>
            <div class="space-y-4">
                @foreach($build->relic_sets_data as $relicSet)
                    <div>
                        <p class="text-l mb-2">{{ $relicSet['pieces'] }}-piece: {{ $relicSet['relic']->name }}</p>
                        <div class="flex gap-2">
                            @foreach($relicSet['images'] as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="relic part" class="w-16 h-16 rounded-full object-cover">
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Ornament Sets -->
        <div class="col-span-12 lg:col-span-3">
            <h3 class="text-2xl font-bold text-white mb-4 border-b-2 border-yellow-500 pb-2">Ornament Sets</h3>
            <div class="space-y-2">
                @foreach($build->planar_ornaments as $ornament)
                    <p class="text-l ">2-piece: {{ $ornament->name }}</p>
                    <div class="flex gap-2">
                        @if($ornament->planar_image)
                            <img src="{{ asset('storage/' . $ornament->planar_image) }}" alt="planar" class="w-16 h-16 rounded-full object-cover">
                        @endif
                        @if($ornament->rope_image)
                            <img src="{{ asset('storage/' . $ornament->rope_image) }}" alt="rope" class="w-16 h-16 rounded-full object-cover">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Synergy Characters -->
        <div class="col-span-12 lg:col-span-3">
            <h3 class="text-2xl font-bold text-white mb-4 border-b-2 border-yellow-500 pb-2">Synergy</h3>
            <div class="grid grid-cols-3 gap-2">
                @foreach($build->synergy_characters as $character)
                    <div class="w-20 h-20 bg-gray-800 rounded-full flex items-center justify-center hover:scale-105 transition">
                        <a href="{{ route('characters.show', $character->id) }}" class="block">
                            @if($character->profile_image)
                                <img src="{{ asset("storage/" . $character->profile_image) }}"
                                    alt="{{ $character->name }}"
                                    class="w-20 h-20 rounded-full object-cover">
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Komentar -->
    <h3 class="text-2xl font-bold text-white mb-4 mt-10 border-b-2 border-yellow-500 pb-2">Komentar</h3>

    @foreach ($comments as $comment)
    <div class="mb-4 p-4 bg-gray-900 rounded-lg shadow">
        <div class="flex items-center justify-between">
            <h4 class="text-yellow-400 font-semibold">{{ $comment->username }}</h4>
            <span class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="mt-2 text-white">{{ $comment->content }}</p>
    </div>
    @endforeach

    @if(session('success'))
        <div class="bg-green-600 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('builds.comments.store', $build->id) }}" method="POST" class="mb-6 space-y-4">
        @csrf
        <div>
            <input type="text" name="username"
                   class="w-full p-3 rounded bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   placeholder="Nama Anda" required>
        </div>
        <div>
            <textarea name="content" rows="3"
                      class="w-full p-3 rounded bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                      placeholder="Tulis komentar..." required></textarea>
        </div>
        <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded transition">
            Kirim Komentar
        </button>
    </form>



</div>
@endsection
