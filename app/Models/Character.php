<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'characters';

    protected $fillable = [
        'name',
        'image',
        'path',
        'rarity',
        'hp',
        'atk',
        'def',
        'spd',
        'taunt',
        'skills',
        'traces',
        'eidolons',
        'story',
        'element',
        'archetype',
        'summons',
        'background_image',
        'profile_image',
        'summon_image',
        'summon_name',
    ];

    protected $casts = [
        'skills' => 'array',
        'traces' => 'array',
        'eidolons' => 'array',
        'story' => 'array',
        'summons' => 'array',
        'rarity' => 'integer',
        'hp' => 'integer',
        'atk' => 'integer',
        'def' => 'integer',
        'spd' => 'integer',
        'taunt' => 'integer',
    ];

    public function builds()
    {
        return $this->hasMany(Build::class);
    }

    // Helper method to get path image
    public function getPathImageAttribute()
    {
        return "assets/paths/{$this->path}.png";
    }

    // Helper method to get element image
    public function getElementImageAttribute()
    {
        return "assets/elements/{$this->element}.png";
    }

    // Get eidolon data by level
    public function getEidolonByLevel($level)
    {
        if (!$this->eidolons || !is_array($this->eidolons) || $level < 1 || $level > 6) {
            return null;
        }

        return $this->eidolons[$level - 1] ?? null;
    }

    // Get all available eidolons
    public function getEidolonOptionsAttribute()
    {
        if (!$this->eidolons || !is_array($this->eidolons)) {
            return [];
        }

        $options = [];
        foreach ($this->eidolons as $index => $eidolon) {
            $level = $index + 1;
            $options[$level] = "E{$level}: " . ($eidolon['name'] ?? "Eidolon {$level}");
        }

        return $options;
    }

    // Di Character.php
    public function build()
    {
        return $this->hasOne(Build::class);
    }
}
