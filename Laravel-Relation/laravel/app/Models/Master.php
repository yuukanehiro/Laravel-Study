<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = 'masters';

    public function pokemon()
    {
        return $this->belongsToMany('App\Models\Pokemon', 'pokemons');
    }
}
