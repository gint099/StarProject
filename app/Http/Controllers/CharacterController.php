<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $query = Character::query();

        if ($request->filled('path')) {
            $query->where('path', $request->path);
        }
        if ($request->filled('element')) {
            $query->where('element', $request->element);
        }
        if ($request->filled('summon')) {
            $query->where('summon', $request->summon);
        }

        if ($request->filled('rarity')) {
            $query->where('rarity', $request->rarity);
        }

        $characters = $query->get();
        return view('characters.index', compact('characters'));
    }

    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }
}
