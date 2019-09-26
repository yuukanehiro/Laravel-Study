<?php

namespace App\Http\Services;

use App\Http\Repositories\PokemonMasterRepository;
use App\Models\Master;
use App\Services\Service;

class PokemonMasterService extends Service
{
    private $pokemonMasterRepository;

    public function __construct(
        PokemonMasterRepository $pokemonMasterRepository
    ) {
        $this->pokemonMasterRepository = $pokemonMasterRepository;
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
            $this->pokemonMasterRepository->win($id);
            $battleResult['result'] = 'win';
        } else {
            $this->pokemonMasterRepository->lose($id);
            $battleResult['result'] = 'lose';
        }
        return $battleResult;
    }
}