<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamVariant extends Model
{
    protected $fillable = ['party_id', 'type', 'roles'];

    protected $casts = [
        'roles' => 'array',
    ];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function characters()
    {
        return Character::whereIn('id', collect($this->roles)->pluck('character_id'))->get();
    }
}
