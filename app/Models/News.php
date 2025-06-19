<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Character;
use App\Models\Lightcone;

class News extends Model
{
    protected $fillable = [
        'title', 'image', 'description', 'is_featured', 'type', 'related_id',
    ];

    public function related()
    {
        return match ($this->type) {
            'character' => $this->belongsTo(Character::class, 'related_id'),
            'lightcone' => $this->belongsTo(Lightcone::class, 'related_id'),
            default => null,
        };
    }

    public function getLinkAttribute()
    {
        return match ($this->type) {
            'character' => route('characters.show', $this->related_id),
            'lightcone' => route('lightcones.show', $this->related_id),
            default => '#',
        };
    }
}

