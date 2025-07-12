<?php

namespace App\Http\Controllers;

use App\Models\BossGuide;
use Illuminate\Http\Request;

class BossGuideController extends Controller
{
    public function index()
    {
        $bosses = BossGuide::latest()->get();
        return view('boss-guides.index', compact('bosses'));
    }

    public function show(BossGuide $bossGuide)
    {
        return view('boss-guides.show', compact('bossGuide'));
    }
}
