<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Build;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index(Request $request)
    {
        $query = Character::query();

        if ($request->has('path')) {
            $query->where('path', $request->input('path'));
        }

        if ($request->has('element')) {
            $query->where('element', $request->input('element'));
        }

        if ($request->has('rarity')) {
            $query->where('rarity', $request->input('rarity'));
        }

        $characters = $query->get();

        return view('builds.index', compact('characters'));
    }



    public function show($id): View
    {
        $build = Build::with('character', 'relic1', 'relic2', 'planar')->findOrFail($id);
        return view('builds.show', compact('build'));

        // $build->load([
        //     'character',
        //     'lightcones',
        //     'synergyCharacters'
        // ]);
        // return view('builds.show', compact('build'));
    }

}

