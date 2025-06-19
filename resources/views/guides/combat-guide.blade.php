@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10 text-white">
    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-8 shadow-lg border border-yellow-500/20">
        <h1 class="text-4xl font-extrabold mb-6 text-yellow-400">Panduan Sistem Pertempuran</h1>

        <section class="mb-10">
            <h2 class="text-2xl font-bold mb-2">🔹 Sistem Pertempuran</h2>
            <p class="mb-4 leading-relaxed">
                <span class="font-semibold">Honkai: Star Rail</span> menggunakan sistem pertarungan berbasis giliran ala JRPG. Kamu akan membentuk tim berisi 4 karakter untuk menghadapi musuh. Urutan giliran ditentukan oleh stat <span class="text-blue-400 font-semibold">SPD (Speed)</span>. Semakin tinggi SPD, semakin cepat karakter bertindak kembali.
            </p>
        </section>

        <section class="mb-10">
            <h2 class="text-2xl font-bold mb-2">🔸 Pre-Combat</h2>
            <p class="mb-4">
                Saat menjelajahi dunia, kamu bisa memulai pertarungan dengan <span class="text-green-300">menyerang musuh</span> terlebih dahulu atau sebaliknya. Jika kamu:
            </p>
            <ul class="list-disc list-inside mb-4">
                <li><strong>Menyerang musuh</strong> dengan <em>Basic Attack</em> atau <em>Technique</em>, pertarungan dimulai normal.</li>
                <li><strong>Menyerang dengan elemen yang musuh lemah</strong>, musuh mulai dalam kondisi <span class="text-yellow-400 font-semibold">Weakness</span> (Toughness berkurang).</li>
                <li><strong>Disergap</strong> tanpa sempat menyerang, pertarungan dimulai dalam keadaan <span class="text-red-400 font-semibold">Ambushed</span> (musuh bertindak duluan).</li>
            </ul>
        </section>

        <section class="mb-10">
            <h2 class="text-2xl font-bold mb-2">🔹 Aksi Pemain</h2>
            <ul class="list-disc list-inside mb-4">
                <li><strong>Basic Attack:</strong> menghasilkan 1 Skill Point & 20 Energi.</li>
                <li><strong>Skill:</strong> Menghabiskan Skill Point, menghasilkan 30 Energi.</li>
                <li><strong>Ultimate:</strong> Bisa digunakan kapan saja jika energinya cukup (biasanya 100).</li>
            </ul>
            <p class="mb-4">Skill Points disimpan untuk seluruh tim, maksimal 5. Ultimate bisa digunakan di luar giliran dan dapat menyalip giliran musuh (interrupt).</p>
        </section>

        <section class="mb-10">
            <h2 class="text-2xl font-bold mb-2">🔸 Musuh dan Weakness Break</h2>
            <p class="mb-4">
                Musuh memiliki dua bar:
            </p>
            <ul class="list-disc list-inside mb-4">
                <li><strong>HP (Merah):</strong> bar darah biasa.</li>
                <li><strong>Toughness (Putih):</strong> hanya bisa dikurangi dengan elemen yang menjadi kelemahan musuh.</li>
            </ul>
            <p class="mb-4">Saat Toughness = 0, musuh terkena <span class="text-yellow-400 font-semibold">Weakness Break</span> dan menerima efek spesial tergantung elemen.</p>
        </section>

        <section class="mb-10">
            <h2 class="text-2xl font-bold mb-4">🧊 Efek Weakness Break Berdasarkan Elemen</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-300 border border-gray-600">
                    <thead class="bg-gray-800 text-yellow-400 text-sm uppercase">
                        <tr>
                            <th class="px-4 py-2 border border-gray-600">Elemen</th>
                            <th class="px-4 py-2 border border-gray-600">Damage</th>
                            <th class="px-4 py-2 border border-gray-600">Debuff</th>
                            <th class="px-4 py-2 border border-gray-600">Deskripsi Efek</th>
                            <th class="px-4 py-2 border border-gray-600 text-center">DoT?</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900">
                        <tr>
                            <td class="px-4 py-2 border border-gray-700 text-red-200 font-semibold">Physical</td>
                            <td class="px-4 py-2 border border-gray-700">Tertinggi</td>
                            <td class="px-4 py-2 border border-gray-700">Bleed</td>
                            <td class="px-4 py-2 border border-gray-700">Damage berdasarkan Max HP musuh selama 2 giliran.</td>
                            <td class="px-4 py-2 border border-gray-700 text-center">✅</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border border-gray-700 text-orange-300 font-semibold">Fire</td>
                            <td class="px-4 py-2 border border-gray-700">Tertinggi</td>
                            <td class="px-4 py-2 border border-gray-700">Burn</td>
                            <td class="px-4 py-2 border border-gray-700">Damage over time selama 2 giliran.</td>
                            <td class="px-4 py-2 border border-gray-700 text-center">✅</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border border-gray-700 text-green-300 font-semibold">Wind</td>
                            <td class="px-4 py-2 border border-gray-700">Tinggi</td>
                            <td class="px-4 py-2 border border-gray-700">Wind Shear</td>
                            <td class="px-4 py-2 border border-gray-700">DOT 2 giliran, stack hingga 5 kali.</td>
                            <td class="px-4 py-2 border border-gray-700 text-center">✅</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border border-gray-700 text-purple-300 font-semibold">Lightning</td>
                            <td class="px-4 py-2 border border-gray-700">Sedang</td>
                            <td class="px-4 py-2 border border-gray-700">Shock</td>
                            <td class="px-4 py-2 border border-gray-700">DOT selama 2 giliran.</td>
                            <td class="px-4 py-2 border border-gray-700 text-center">✅</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border border-gray-700 text-blue-300 font-semibold">Ice</td>
                            <td class="px-4 py-2 border border-gray-700">Sedang</td>
                            <td class="px-4 py-2 border border-gray-700">Freeze</td>
                            <td class="px-4 py-2 border border-gray-700">Membekukan 1 giliran, lalu aksinya dipercepat 50% setelah pulih.</td>
                            <td class="px-4 py-2 border border-gray-700 text-center">❌</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border border-gray-700 text-pink-300 font-semibold">Quantum</td>
                            <td class="px-4 py-2 border border-gray-700">Rendah</td>
                            <td class="px-4 py-2 border border-gray-700">Entanglement</td>
                            <td class="px-4 py-2 border border-gray-700">Menunda aksi & stack hingga 5 kali saat terkena serangan.</td>
                            <td class="px-4 py-2 border border-gray-700 text-center">❌</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border border-gray-700 text-yellow-300 font-semibold">Imaginary</td>
                            <td class="px-4 py-2 border border-gray-700">Tidak ada</td>
                            <td class="px-4 py-2 border border-gray-700">Imprisonment</td>
                            <td class="px-4 py-2 border border-gray-700">Menunda aksi & mengurangi SPD 10% selama 1 giliran.</td>
                            <td class="px-4 py-2 border border-gray-700 text-center">❌</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection
