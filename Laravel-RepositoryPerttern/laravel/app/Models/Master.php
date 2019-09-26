<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Master extends Model
{
    protected $table = 'masters';
    protected $primaryKey = 'master_id';
    protected $guarded = [
        'master_id'
    ];
    protected $appends = ['winning_percent'];

    public function pokemon()
    {
        return $this->belongsToMany('App\Models\Pokemon');
    }

    public function master_pokemon()
    {
        return $this->belongsToMany('App\Models\Pokemon', 'master_pokemon', 'master_id', 'pokemon_id')
            ->withPivot('comment');
    }

    public static function getCntBattle(int $id): ?int
    {
        $rec = Master::find($id);
        return $result = $rec->cnt_battle;
    }

    public static function getCntWon(int $id): ?int
    {
        $rec = Master::find($id);
        return $result = $rec->cnt_won;
    }

    public function getWinningPercenteAttribute()
    {
        return 100;
    }
}
