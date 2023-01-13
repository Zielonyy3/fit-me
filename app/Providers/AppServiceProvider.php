<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryContract;
use App\Repositories\Contracts\ExerciseRepositoryContract;
use App\Repositories\Contracts\RoutineRepositoryContract;
use App\Repositories\ExerciseRepository;
use App\Repositories\RoutineRepository;
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
        $this->app->bind(BaseRepositoryContract::class, BaseRepository::class);
        $this->app->bind(RoutineRepositoryContract::class, RoutineRepository::class);
        $this->app->bind(ExerciseRepositoryContract::class, ExerciseRepository::class);
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
