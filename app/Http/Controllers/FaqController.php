<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = [
            [
                'question' => 'Bagaimana cara bergabung ke komunitas Discord?',
                'answer' => 'Klik ikon Discord pada bagian atas atau footer halaman untuk masuk ke server komunitas kami.'
            ],
            [
                'question' => 'Apa itu Lightcone dan bagaimana cara mendapatkannya?',
                'answer' => 'Lightcone adalah senjata khusus yang meningkatkan kemampuan karakter. Didapatkan melalui gacha atau event dalam game.'
            ],
            [
                'question' => 'Bagaimana cara membaca build karakter di situs ini?',
                'answer' => 'Masuk ke halaman karakter lalu klik tab “Build”. Kamu akan melihat rekomendasi Eidolon, Lightcone, Relic, dan lainnya.'
            ],
        ];

        return view('faq.index', compact('faqs'));
    }
}
