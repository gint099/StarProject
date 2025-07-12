<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = ['name', 'type', 'dps_id', 'sub_dps_id', 'support_id', 'sustain_id', 'description'];

    public function dps()
    {
        return $this->belongsTo(Character::class, 'dps_id');
    }

    public function subDps()
    {
        return $this->belongsTo(Character::class, 'sub_dps_id');
    }

    public function support()
    {
        return $this->belongsTo(Character::class, 'support_id');
    }

    public function sustain()
    {
        return $this->belongsTo(Character::class, 'sustain_id');
    }
}
