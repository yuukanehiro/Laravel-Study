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

    public function win(int $id): void
    {
      $master = $this->model->find($id);
      $master->increment('cnt_battle');
      $master->increment('cnt_won');
    }

    public function lose(int $id): void
    {
        $master = $this->model->find($id);
        $master->increment('cnt_battle');
    }

    public function getAllMaster(int $id): object
    {
        $master = $this->model->where('master_id', $id)->get();
        return $master;
    }
}