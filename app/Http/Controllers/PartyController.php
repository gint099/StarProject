<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Character;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    // INDEX — satu party per karakter DPS
    public function index(Request $request)
    {
        // Ambil ID karakter DPS unik dari party terbaru per DPS
        $latestPerDps = Party::selectRaw('MAX(id) as id')
            ->groupBy('dps_id');

        $parties = Party::whereIn('id', $latestPerDps->pluck('id'))
            ->with('dps')
            ->latest()
            ->get();

        return view('parties.index', compact('parties'));
    }

    // SHOW — semua party berdasarkan karakter DPS
    public function characterParties(Character $character)
    {
        $parties = Party::with(['dps', 'subDps', 'support', 'sustain'])
            ->where('dps_id', $character->id)
            ->latest()
            ->get();

        return view('parties.character-parties', compact('character', 'parties'));
    }
}
