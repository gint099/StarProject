<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Relic;

class RelicController extends Controller
{
    public function index(Request $request)
    {
        $query = Relic::query();

        // Filter by type
        if ($request->has('type') && $request->type !== '') {
            $query->where('type', $request->type);
        }

        // Filter by rarity (jika diperlukan)
        if ($request->has('rarity') && $request->rarity !== '') {
            $query->where('rarity', $request->rarity);
        }

        $relics = $query->get();

        return view('relics.index', compact('relics'));
    }
}
