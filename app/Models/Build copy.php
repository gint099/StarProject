<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Build extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id',
        'recommended_eidolon',
        'eidolon_description',
        'lightcones',
        'relic_sets',
        'ornament_id',
        'main_stats',
        'substats',
        'synergy_characters',
        'spd',
        'cr',
        'cd',
        'er',
        'hr',
        'be',
    ];

    protected $casts = [
        'lightcones' => 'array',
        'relic_sets' => 'array',
        'main_stats' => 'array',
        'substats' => 'array',
        'synergy_characters' => 'array',
        'spd' => 'str',
        'cr' => 'str',
        'cd' => 'str',
        'er' => 'str',
        'hr' => 'str',
        'be' => 'str',
    ];

    // --- Relationships ---

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function ornament()
    {
        return $this->belongsTo(Relic::class, 'ornament_id');
    }

    // Lightcones (manual array relation)
    public function lightconeModels()
    {
        return Lightcone::whereIn('id', $this->lightcones ?? [])->get();
    }

    // Relic set references (manual from relic_sets array)
    public function relicSetModels()
    {
        $ids = collect($this->relic_sets)->pluck('relic_id')->unique()->toArray();
        return Relic::whereIn('id', $ids)->get();
    }

    // Synergy Characters (manual array relation)
    public function synergyCharacterModels()
    {
        return Character::whereIn('id', $this->synergy_characters ?? [])->get();
    }
}
