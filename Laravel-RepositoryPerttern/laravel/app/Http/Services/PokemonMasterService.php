<?php

namespace App\Http\Services;

use App\Repositories\PokemonMasterRepository;
use App\Models\Master;

class PokemonMasterService
{
    public static $pokemonMasterRepository;

    public function __construct(
        Master $master,
        PokemonMasterRepository $pokemonMasterRepository
    ) {
        $this->pokemonMasterRepository = new pokemonMasterRepository($master);
    }

    public static function battle(int $id): float
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
            $this->pokemonMasterRepository::win($id);
        } else {
            $this->pokemonMasterRepository::lose($id);
        }
        return $this->pokemonMasterRepository->getWinningPercentage($id);
    }
}
