@extends('layouts.app')

@section('content')
<div class="container py-10">
    <h1 class="text-3xl font-bold text-white mb-6">Endgame Guide</h1>

    <ul class="flex space-x-4 mb-6 border-b border-gray-700">
        @foreach($contents as $type => $contentGroup)
            <li>
                <button onclick="openTab('{{ $type }}')" class="tab-btn px-4 py-2 text-white bg-gray-700 rounded-t">
                    {{ $type }}
                </button>
            </li>
        @endforeach
    </ul>

    @foreach($contents as $type => $contentGroup)
        <div class="tab-content" id="tab-{{ $type }}" style="display: none;">
            @foreach($contentGroup as $content)
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-yellow-300">{{ $content->name }}</h2>
                    <p class="text-gray-300">{{ $content->description }}</p>
                    <p class="italic text-sm text-gray-400">Reset: {{ ucfirst($content->reset_schedule) }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        @foreach($content->stages as $stage)
                            <div class="bg-gray-800 p-4 rounded-lg shadow">
                                <h3 class="font-semibold text-lg text-white">{{ $stage->name }}</h3>
                                @if($stage->image)
                                    <img src="{{ asset('storage/' . $stage->image) }}" class="w-full h-48 object-cover my-2 rounded">
                                @endif
                                <p class="text-gray-300"><strong>Mekanik:</strong> {{ $stage->mechanics }}</p>
                                <p class="text-gray-300"><strong>Elemen Disarankan:</strong> {{ $stage->recommended_elements }}</p>
                                <p class="text-gray-300"><strong>Tim Rekomendasi:</strong> {{ $stage->recommended_team }}</p>
                                <p class="text-gray-300"><strong>Tips:</strong> {{ $stage->tips }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<script>
function openTab(type) {
    document.querySelectorAll('.tab-content').forEach(div => div.style.display = 'none');
    document.getElementById('tab-' + type).style.display = 'block';
}
document.addEventListener('DOMContentLoaded', () => {
    const firstTab = document.querySelector('.tab-content');
    if (firstTab) firstTab.style.display = 'block';
});
</script>
@endsection
