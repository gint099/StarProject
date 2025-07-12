<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EndgameContent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'description', 'reset_schedule', 'image'];

    public function stages()
    {
        return $this->hasMany(EndgameStage::class);
    }
}
