<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Character;
use App\Models\Lightcone;
use App\Models\Relic;
use App\Models\Comment;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index()
    {
        $builds = Build::with(['character'])->latest()->get();
        $characters = Character::whereIn('id', Build::pluck('character_id'))->get();
        return view('builds.index', compact('builds', 'characters'));
    }

    public function show(Build $build)
    {
        $comments = Comment::where('build_id', $build->id)->latest()->get();
        $build->load(['character']);

        return view('builds.show', compact('build', 'comments'));
    }

    public function create()
    {
        $characters = Character::all();
        $lightcones = Lightcone::all();
        $relics = Relic::where('type', 'relic')->get();
        $planarOrnaments = Relic::where('type', 'planar')->get();

        return view('builds.create', compact('characters', 'lightcones', 'relics', 'planarOrnaments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'character_id' => 'required|exists:characters,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lightcone_ids' => 'nullable|array',
            'lightcone_ids.*' => 'exists:lightcones,id',
            'spd_value' => 'nullable|numeric',
            'cr_value' => 'nullable|numeric',
            'cd_value' => 'nullable|numeric',
            'er_value' => 'nullable|numeric',
            'hr_value' => 'nullable|numeric',
            'be_value' => 'nullable|numeric',
            'body_main_stat' => 'nullable|string',
            'boots_main_stat' => 'nullable|string',
            'planar_main_stat' => 'nullable|string',
            'rope_main_stat' => 'nullable|string',
            'substats' => 'nullable|array',
            'eidolon_level' => 'nullable|integer|min:0|max:6',
            'relic_sets' => 'nullable|array',
            'planar_ornament_ids' => 'nullable|array',
            'planar_ornament_ids.*' => 'exists:relics,id',
            'synergy_character_ids' => 'nullable|array',
            'synergy_character_ids.*' => 'exists:characters,id',
        ]);

        $build = Build::create($validated);

        return redirect()->route('builds.show', $build)
                        ->with('success', 'Build created successfully!');
    }

    public function edit(Build $build)
    {
        $characters = Character::all();
        $lightcones = Lightcone::all();
        $relics = Relic::where('type', 'relic')->get();
        $planarOrnaments = Relic::where('type', 'planar')->get();

        return view('builds.edit', compact('build', 'characters', 'lightcones', 'relics', 'planarOrnaments'));
    }

    public function update(Request $request, Build $build)
    {
        $validated = $request->validate([
            'character_id' => 'required|exists:characters,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lightcone_ids' => 'nullable|array',
            'lightcone_ids.*' => 'exists:lightcones,id',
            'spd_value' => 'nullable|numeric',
            'cr_value' => 'nullable|numeric',
            'cd_value' => 'nullable|numeric',
            'er_value' => 'nullable|numeric',
            'hr_value' => 'nullable|numeric',
            'be_value' => 'nullable|numeric',
            'body_main_stat' => 'nullable|string',
            'boots_main_stat' => 'nullable|string',
            'planar_main_stat' => 'nullable|string',
            'rope_main_stat' => 'nullable|string',
            'substats' => 'nullable|array',
            'eidolon_level' => 'nullable|integer|min:0|max:6',
            'relic_sets' => 'nullable|array',
            'planar_ornament_ids' => 'nullable|array',
            'planar_ornament_ids.*' => 'exists:relics,id',
            'synergy_character_ids' => 'nullable|array',
            'synergy_character_ids.*' => 'exists:characters,id',
        ]);

        $build->update($validated);

        return redirect()->route('builds.show', $build)
                        ->with('success', 'Build updated successfully!');
    }

    public function destroy(Build $build)
    {
        $build->delete();

        return redirect()->route('builds.index')
                        ->with('success', 'Build deleted successfully!');
    }

    public function storeComment(Request $request, $buildId)
    {
        $request->validate([
            'username' => 'required|max:30',
            'content' => 'required|max:500',
        ]);

        Comment::create([
            'build_id' => $buildId,
            'username' => $request->username,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

}
