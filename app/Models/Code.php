<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'date',
        'is_used'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
