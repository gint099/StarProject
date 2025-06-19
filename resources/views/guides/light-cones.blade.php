@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 max-w-5xl px-4">
    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-8 shadow-lg border border-yellow-500/20">
        <h1 class="text-4xl font-extrabold text-yellow-400 mb-6">Panduan Light Cone</h1>

        <p class="text-gray-200 mb-6 text-lg leading-relaxed">
            <span class="font-semibold text-white">Light Cone</span> adalah perlengkapan penting dalam <em>Honkai: Star Rail</em> yang berperan layaknya senjata. Setiap karakter bisa memakainya untuk meningkatkan statistik dasar serta mengaktifkan efek pasif khusus, tergantung pada Path mereka.
        </p>

        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gray-800 p-4 rounded-xl border border-yellow-300/20">
                <h2 class="text-yellow-300 text-xl font-semibold mb-2">Level & Ascension</h2>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Setiap Light Cone dapat dinaikkan dari Level <span class="font-semibold text-white">1</span> hingga <span class="font-semibold text-white">80</span>. Proses Ascension akan meningkatkan kapasitas level maksimal dan statistik yang diberikan.
                </p>
            </div>

            <div class="bg-gray-800 p-4 rounded-xl border border-yellow-300/20">
                <h2 class="text-yellow-300 text-xl font-semibold mb-2">Light Cone Ability</h2>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Merupakan bonus pasif yang terikat pada <span class="text-white font-semibold">Path</span> tertentu. Hanya karakter dengan Path yang sesuai yang dapat mengaktifkan efek ini.
                </p>
            </div>

            <div class="bg-gray-800 p-4 rounded-xl border border-yellow-300/20">
                <h2 class="text-yellow-300 text-xl font-semibold mb-2">Superimpose</h2>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Gunakan Light Cone duplikat untuk meningkatkan <span class="text-white font-semibold">Rank (1-5)</span> dari abilitas pasif. Setiap peningkatan memberikan bonus tambahan namun akan menghapus Light Cone duplikat yang digunakan.
                </p>
            </div>

            <div class="bg-gray-800 p-4 rounded-xl border border-yellow-300/20">
                <h2 class="text-yellow-300 text-xl font-semibold mb-2">Kesesuaian Path</h2>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Karakter yang memakai Light Cone dengan Path <span class="text-white font-semibold">yang tidak sesuai</span> tetap mendapatkan statistik dasar, namun efek pasif <span class="italic text-yellow-400">tidak akan aktif</span>.
                </p>
            </div>
        </div>

        <div class="flex justify-center my-6">
            <a href="{{ route('lightcones.index') }}" class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-semibold py-2 px-5 rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
                Lihat Daftar Light Cone
            </a>
        </div>

        <p class="text-sm text-gray-500 text-center mt-10 italic">Terakhir diperbarui: Juni 2025</p>
    </div>
</div>
@endsection
