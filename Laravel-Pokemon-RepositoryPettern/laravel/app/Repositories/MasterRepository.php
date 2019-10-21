<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Repository;


class MasterRepository extends Repository
{
    public function __construct(Model $model)
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