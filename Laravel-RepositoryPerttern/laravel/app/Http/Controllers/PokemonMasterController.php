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
        $responseMaster->winning_percent = $pokemonMasterRepository->getWinningPercentage($userId);
        return response()->json($responseMaster);
    }
}
