<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'userId',
        'recetteid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recetteid');
    }
}
