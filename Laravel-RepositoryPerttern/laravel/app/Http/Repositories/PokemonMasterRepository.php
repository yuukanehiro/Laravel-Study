<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Master;
use App\Models\Pokemon;

class PokemonMasterRepository extends Repository
{
    public function __construct(Master $model)
    {
        $this->model = $model;
    }
    /**
     * 勝率を取得
     *
     * @param $id int
     * @return float
     */
    public static function getWinningPercentage(int $id): ?float
    {
        if(Master::getCntBattle($id) != 0) {
            //return $this->model->getCntWon($id) / $this->model->getCntBattle($id);
            return Master::getCntWon($id) / Master::getCntBattle($id);
        } else {
            return null;
        }
    }

    public function getWinning_percentageAttribute($id)
    {
        $attr = self::getWinningPercentage($id);
        return $attr;
    }

    public static function win($id): void
    {
      $master = $this->model->find($id);
      $master->increment('cnt_battle');
      $master->increment('cnt_won');
    }

    public static function lose($id): void
    {
        $master = $this->model->find($id);
        $master->increment('cnt_battle');
    }

    public function getAllMaster($id): object
    {
        $master = $this->model->where('master_id', $id)->get();
        return $master;
    }


}