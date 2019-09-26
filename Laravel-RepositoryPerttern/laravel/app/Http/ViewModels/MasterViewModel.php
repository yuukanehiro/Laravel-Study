<?php

namespace App\Http\ViewModels;

use App\Models\Master;
//use App\Http\Repositories\PokemonMasterRepository;

class MasterViewModel extends ViewModel
{
    public function render(): Master
    {
        return $this->master
            ->makeHidden(['master_id',
                          'created_at',
                          'updated_at'
            ]);
    }
}