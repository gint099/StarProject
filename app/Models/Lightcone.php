<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lightcone extends Model
{
    protected $fillable = [
        'name',
        'image',
        'image_full',
        'profile_image',
        'background_image',
        'path',
        'rarity',
        'hp',
        'atk',
        'def',
        'superimposition_name',
        'superimposition_lv1',
        'superimposition_lv2',
        'superimposition_lv3',
        'superimposition_lv4',
        'superimposition_lv5',
        'story',
    ];

    protected $casts = [
        'story' => 'array',
    ];
}
