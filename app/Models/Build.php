<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id',
        'name',
        'description',
        'lightcone_ids', // JSON array untuk multi-select lightcones

        // Stats values
        'spd_value',
        'cr_value',
        'cd_value',
        'er_value',
        'hr_value',
        'be_value',

        // Main stats
        'body_main_stat',
        'boots_main_stat',
        'planar_main_stat',
        'rope_main_stat',

        // Substats (store as JSON array)
        'substats',

        // Eidolon level
        'eidolon_level',

        // Relic sets (JSON) - store relic_id and piece count
        'relic_sets',

        // Planar ornament set
        'planar_ornament_ids', // JSON array untuk multiple planar ornaments

        // Synergy characters (JSON array of character IDs)
        'synergy_character_ids',
    ];

    protected $casts = [
        'lightcone_ids' => 'array',
        'substats' => 'array',
        'relic_sets' => 'array',
        'planar_ornament_ids' => 'array',
        'synergy_character_ids' => 'array',
        'eidolon_level' => 'integer',
        'spd_value' => 'decimal:1',
        'cr_value' => 'decimal:1',
        'cd_value' => 'decimal:1',
        'er_value' => 'decimal:1',
        'hr_value' => 'decimal:1',
        'be_value' => 'decimal:1',
    ];

    // Relationships
    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    // Get selected lightcones
    public function getLightconesAttribute()
    {
        if (empty($this->lightcone_ids)) {
            return collect();
        }

        return Lightcone::whereIn('id', $this->lightcone_ids)->get();
    }

    // Get selected planar ornaments
    public function getPlanarOrnamentsAttribute()
    {
        if (empty($this->planar_ornament_ids)) {
            return collect();
        }

        return Relic::whereIn('id', $this->planar_ornament_ids)
                   ->where('type', 'planar')
                   ->get();
    }

    // Get synergy characters
    public function getSynergyCharactersAttribute()
    {
        if (empty($this->synergy_character_ids)) {
            return collect();
        }

        return Character::whereIn('id', $this->synergy_character_ids)->get();
    }

    // Get relic sets data with images
    public function getRelicSetsDataAttribute()
    {
        if (empty($this->relic_sets)) {
            return collect();
        }

        $relicSets = [];
        foreach ($this->relic_sets as $setData) {
            $relic = Relic::find($setData['relic_id']);
            if ($relic) {
                $images = [];
                $pieceCount = $setData['pieces'];

                // Get images based on piece count
                if ($pieceCount >= 1) $images[] = $relic->head_image;
                if ($pieceCount >= 2) $images[] = $relic->hand_image;
                if ($pieceCount >= 3) $images[] = $relic->body_image;
                if ($pieceCount >= 4) $images[] = $relic->boots_image;

                $relicSets[] = [
                    'relic' => $relic,
                    'pieces' => $pieceCount,
                    'images' => $images,
                    'set_bonus' => $pieceCount == 4 ? $relic->set_bonus_4 : ($pieceCount == 2 ? $relic->set_bonus_2 : null)
                ];
            }
        }

        return collect($relicSets);
    }

    // Get character eidolon data
    public function getEidolonDataAttribute()
    {
        if (!$this->character || !$this->eidolon_level || $this->eidolon_level < 1) {
            return null;
        }

        $eidolons = $this->character->eidolons;
        if (is_array($eidolons) && isset($eidolons[$this->eidolon_level - 1])) {
            return $eidolons[$this->eidolon_level - 1];
        }

        return null;
    }

    // Get gear slot image (body, boots, planar, rope)
    public function getSlotImage($position)
    {
        $slotImages = [
            'body' => 'body.webp',
            'boots' => 'boots.webp',
            'planar' => 'planar.webp',
            'rope' => 'rope.webp',
            'head' => 'head.webp',
            'hands' => 'hands.webp'
        ];

        return $slotImages[$position] ?? 'default.webp';
    }

    // Get substats with images
    public function getSubstatsDataAttribute()
    {
        if (empty($this->substats)) {
            return collect();
        }

        $substatsData = [];
        foreach ($this->substats as $substat) {
            $substatsData[] = [
                'type' => $substat['type'],
                'value' => $substat['value'] ?? 0,
                'image' => $this->getSubstatImage($substat['type'])
            ];
        }

        return collect($substatsData);
    }

    // Helper method to get substat image path
    private function getSubstatImage($type)
    {
        $imageMap = [
            'hp' => 'assets/stats/hp.webp',
            'atk' => 'assets/stats/atk.webp',
            'def' => 'assets/stats/def.webp',
            'spd' => 'assets/stats/spd.webp',
            'cr' => 'assets/stats/cr.webp',
            'cd' => 'assets/stats/cd.webp',
            'er' => 'assets/stats/er.webp',
            'ehr' => 'assets/stats/ehr.webp',
            'be' => 'assets/stats/be.webp',
            'hr' => 'assets/stats/hr.webp',
        ];

        return $imageMap[$type] ?? 'assets/stats/default.webp';
    }

    // Get main stat image
    public function getMainStatImage($position)
    {
        $stat = null;
        switch ($position) {
            case 'body':
                $stat = $this->body_main_stat;
                break;
            case 'boots':
                $stat = $this->boots_main_stat;
                break;
            case 'planar':
                $stat = $this->planar_main_stat;
                break;
            case 'rope':
                $stat = $this->rope_main_stat;
                break;
        }

        return $stat ? $this->getSubstatImage($stat) : 'assets/stats/default.webp';
    }
}
