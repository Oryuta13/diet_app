<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metabolism extends Model
{
    protected $fillable = [
        'user_id',
        'height',
        'weight',
        'gender',
        'age',
        'active_level',
        'metabolism',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
