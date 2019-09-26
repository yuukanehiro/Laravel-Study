<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PokemonMasterService;
use App\Http\Repositories\PokemonMasterRepository;
use App\Http\ViewModels\MasterViewModel;
use Illuminate\Routing\ResponseFactory;

class PokemonMasterController extends Controller
{
    public function getMaster(
        PokemonMasterRepository $pokemonMasterRepository,
        Request $request
    ) {
        $userId = $request->id;
        $master = $pokemonMasterRepository->getAllMaster($userId);
        $responseMaster = $master
                    ->map(function ($item, $key){
                        return (new MasterViewModel(['master' => $item]))->render();
                    });
        return response()->json($responseMaster);
    }

    public function fight(
        PokemonMasterService $pokemonMasterService,
        Request $request
    ) {
        $userId = $request->id;
        //dd($userId); 2
        //exit();
        $battleResult = $pokemonMasterService->battle($userId);
        //dd($battleResult);
        //exit();
        return response()->json($battleResult);
    }
}