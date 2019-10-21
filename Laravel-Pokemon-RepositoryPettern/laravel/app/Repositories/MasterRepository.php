<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;

class MasterRepository extends Repository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * バトルの勝利処理
     *
     * @param int $id
     * @return void
     */
    public function win(int $id): void
    {
      $master = $this->model->find($id);
      $master->increment('cnt_battle');
      $master->increment('cnt_won');
    }

    /**
     * バトルの負け処理
     *
     * @param int $id
     * @return void
     */
    public function lose(int $id): void
    {
        $master = $this->model->find($id);
        $master->increment('cnt_battle');
    }

    /**
     * IDを指定してMasterユーザを表示
     *
     * @param int $id
     * @return Collection
     */
    public function getMasterById(int $id): Collection
    {
        $master = $this->model->where('master_id', $id)->get();
        return $master;
    }

    /**
     * Masterユーザをリスト表示
     *
     * @return Collection
     */
    public function getAllMaster(): Collection
    {
        $master = $this->model->get();
        return $master;
    }
}