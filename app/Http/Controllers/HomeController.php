<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $featuredNews = News::where('is_featured', true)->latest()->take(5)->get();
        $latestNews = News::where('is_featured', false)->latest()->first();

        return view('home', compact('featuredNews', 'latestNews'));
    }
}
