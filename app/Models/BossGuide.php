<?php

namespace App\Models;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BossGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        // Basic Info
        'name',
        'boss_type',
        'image',
        'location',
        'location_image',
        'recommended_level',

        // Reset & Availability
        'reset_schedule',
        'trailblaze_cost',

        // Mechanics & Phases
        'phases',

        // Elemental Info
        'weaknesses',
        'resistances',

        // Team Composition
        'recommended_team_ids',
        'team_roles',

        // Strategy Guide
        'phase_strategies',
        'strategy_image',
        'common_mistakes',
        'pro_tips',
    ];

    protected $casts = [
        'phases' => 'array',
        'weaknesses' => 'array',
        'resistances' => 'array',
        'recommended_team_ids' => 'array',
        'team_roles' => 'array',
        'phase_strategies' => 'array',
    ];

    // Optional: relasi ke Party jika ingin menampilkan tim
    public function recommendedParties()
    {
        return $this->belongsToMany(Party::class, 'boss_guide_party', 'boss_guide_id', 'party_id');
    }

    public function recommendedTeams()
    {
        return $this->hasMany(\App\Models\Party::class, 'id', 'dps_id');
    }

    public function getTeamCharacters(): array
    {
        if (!$this->team_roles) return [];

        return collect($this->team_roles)->map(function ($role) {
            $character = Character::find($role['character_id'] ?? null);
            return [
                'role' => $role['role'] ?? '-',
                'character' => $character,
            ];
        })->toArray();
    }
}
