<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            \App\Repositories\MasterRepository::class,
            function ($app) {
                return new \App\Repositories\MasterRepository(new \App\Models\Master);
            }
        );

        $this->app->bind(
            \App\Service\PokemonMasterService::class,
            function ($app) {
                return new App\Service\MasterService(
                $app->make('\App\Repositories\MasterRepository')
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
