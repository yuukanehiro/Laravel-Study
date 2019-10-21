<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PokemonMasterService;
use App\Repositories\MasterRepository;
use App\Http\ViewModels\MasterViewModel;
use Illuminate\Routing\ResponseFactory;

class PokemonMasterController extends Controller
{
    /**
     * Masterユーザをidを指定して取得
     *
     * @param App\Repositories\MasterRepository $MasterRepository
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getMaster(
        MasterRepository $MasterRepository,
        Request $request
    ) {
        $userId = $request->id;
        $master = $MasterRepository->getMasterById($userId);
        $responseMaster = $master
                    ->map(function ($item, $key){
                        return (new MasterViewModel(['master' => $item]))->render();
                    });
        return response()->json($responseMaster);
    }

    /**
     * Masterユーザをリスト取得
     *
     * @param App\Repositories\MasterRepository $MasterRepository
     * @return \Illuminate\Http\Response
     */
    public function getMasters(
        MasterRepository $MasterRepository,
        Request $request
    ) {
        $master = $MasterRepository->getAllMaster();
        $responseMaster = $master
                    ->map(function ($item, $key){
                        return (new MasterViewModel(['master' => $item]))->render();
                    });
        return response()->json($responseMaster);
    }

    /**
     * じゃんけんバトルを行って結果を返却
     *
     * @param App\Http\Services\PokemonMasterService $pokemonMasterService
     * @return \Illuminate\Http\Response
     */
    public function fight(
        PokemonMasterService $pokemonMasterService,
        Request $request
    ) {
        $userId = $request->id;
        $battleResult = $pokemonMasterService->battle($userId);
        return response()->json($battleResult);
    }
}