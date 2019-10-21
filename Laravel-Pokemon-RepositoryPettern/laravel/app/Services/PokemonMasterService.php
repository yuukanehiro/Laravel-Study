<?php

namespace App\Http\Services;

use App\Repositories\MasterRepository;
use App\Models\Master;
use App\Services\Service;

class PokemonMasterService extends Service
{
    private $MasterRepository;

    public function __construct(
        MasterRepository $MasterRepository
    ) {
        $this->MasterRepository = $MasterRepository;
    }

    public function battle(int $id): array
    {
        /**
         * サイコロバトル
         * 偶数：勝ち
         * 奇数：負け
         *
         * @param $id int
         * @return float
         */
        $dice = (int) rand(1,6);
        $result = $dice % 2? 'even' : 'odd';
        if ($result === 'even') {
            $this->MasterRepository->win($id);
            $battleResult['result'] = 'win';
        } else {
            $this->MasterRepository->lose($id);
            $battleResult['result'] = 'lose';
        }
        return $battleResult;
    }
}