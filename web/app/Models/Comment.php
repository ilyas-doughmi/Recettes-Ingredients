<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $fillable = [
        'userId',
        'recetteid',
        'comment'
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
