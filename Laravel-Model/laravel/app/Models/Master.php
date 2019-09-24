<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = 'masters';
    protected $primaryKey = 'master_id';

    public function master_pokemon()
    {
        return $this->belongsToMany('App\Models\Pokemon', 'master_pokemon', 'master_id', 'pokemon_id')
            ->withPivot('comment');
    }
}
