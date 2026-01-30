<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Recipe extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'steps',
        'ingredients',
        'difficulte',
        'categorie_id',
        'image',
        'user_id'
    ];

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categorie()
    {
        return $this->belongsTo(categories::class, 'categorie_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'recetteid')->latest();
    }
}
