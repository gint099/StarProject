<?php
namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function teamArchetypes()
    {
        return view('guides.team-archetypes', [
            'critCharacters' => Character::where('archetype', 'crit')->get(),
            'breakCharacters' => Character::where('archetype', 'break')->get(),
            'fuaCharacters' => Character::where('archetype', 'fua')->get(),
            'dotCharacters' => Character::where('archetype', 'dot')->get(),
        ]);
    }
}
