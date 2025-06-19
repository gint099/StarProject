<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['build_id', 'username', 'content'];

    public function build()
    {
        return $this->belongsTo(Build::class);
    }
}
