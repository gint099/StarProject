<?php

namespace App\Http\Controllers;

use App\Models\Lightcone;
use Illuminate\Http\Request;

class LightconeController extends Controller
{
    public function index(Request $request)
    {
        $query = Lightcone::query();

        if ($request->filled('path')) {
            $query->where('path', $request->path);
        }

        if ($request->filled('rarity')) {
            $query->where('rarity', $request->rarity);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $lightcones = $query->orderByDesc('rarity')->get();

        return view('lightcones.index', compact('lightcones'));
    }

    public function show(Lightcone $lightcone)
    {
        // dd($lightcone->background_image);
        return view('lightcones.show', compact('lightcone'));
    }
}
