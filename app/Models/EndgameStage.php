<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EndgameStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'endgame_content_id',
        'name',
        'mechanics',
        'recommended_elements',
        'recommended_team',
        'tips',
        'image',
    ];

    public function content()
    {
        return $this->belongsTo(EndgameContent::class, 'endgame_content_id');
    }
}
