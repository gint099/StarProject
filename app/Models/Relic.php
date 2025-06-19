<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'head_image',
        'hand_image',
        'body_image',
        'boots_image',
        'planar_image',
        'rope_image',
        'type',
        'rarity',
        'stat',
        'set_bonus_2',
        'set_bonus_4',
    ];
}
