<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';

    public function master()
    {
        return $this->belongsToMany('App\Models\Master', 'masters');
    }
}
