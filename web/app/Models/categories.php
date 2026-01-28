<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;


class categories extends Model
{
    protected $fillable = [
        'name'
    ];

    public function recipes()
    {
        $this->hasMany(Recipe::class,'categorie_id');
    }


}
