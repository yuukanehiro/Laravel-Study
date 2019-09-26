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

    public function pokemon()
    {
        return $this->belongsToMany('App\Models\Pokemon');
    }

    public function master_pokemon()
    {
        return $this->belongsToMany('App\Models\Pokemon',
                                    'master_pokemon',
                                    'master_id',
                                    'pokemon_id')
            ->withPivot('comment');
    }

    public function getCntBattle(int $id = null): ?int
    {
        return $this->cnt_battle;
    }

    public function getCntWon(int $id = null): ?int
    {
        return $this->cnt_won;
    }

    public function getWinningPercentAttribute(): ?float
    {
        if ($this->getCntBattle() === 0) {
            return null;
        }
        return $this->getCntWon() / $this->getCntBattle();
    }
}