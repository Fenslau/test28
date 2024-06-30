<?php

namespace App\Providers;

use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelController;
use App\Repositories\CarBrandRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\CarRepository;
use App\Repositories\ReadonlyRepositoryInterface;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(CarBrandController::class)
            ->needs(ReadonlyRepositoryInterface::class)
            ->give(function () {
                return new CarBrandRepository();
            });

        $this->app->when(CarModelController::class)
            ->needs(ReadonlyRepositoryInterface::class)
            ->give(function () {
                return new CarModelRepository();
            });

        $this->app->when(CarController::class)
            ->needs(RepositoryInterface::class)
            ->give(function () {
                return new CarRepository();
            });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
