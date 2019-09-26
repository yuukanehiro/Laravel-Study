<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Object_;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    protected $primaryKey = 'pokemon_id';
    protected $guarded = [
        'pokemon_id'
    ];

    public function master()
    {
        return $this->belongsToMany('App\Models\Master');
    }

    public function master_pokemon()
    {
        return $this->belongsToMany('App\Models\Master', 'master_pokemon', 'pokemon_id', 'master_id')
            ->withPivot('comment');
    }

    public static function getPokemonName(int $id) :Object
    {
        return Pokemon::select('name')->find($id);
    }
}