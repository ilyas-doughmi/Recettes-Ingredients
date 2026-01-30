<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $fillable = [
        'user_id' ,
        'comment'
    ];

    public function User()
    {
        $this->belongsTo(User::class,'userId');
    }
}
