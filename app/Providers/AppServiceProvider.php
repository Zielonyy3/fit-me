<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryContract;
use App\Repositories\Contracts\ExerciseRepositoryContract;
use App\Repositories\Contracts\PlannedExerciseRepositoryContract;
use App\Repositories\Contracts\PlannedRoutineRepositoryContract;
use App\Repositories\Contracts\RoutineRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Contracts\WorkoutPlanRepositoryContract;
use App\Repositories\ExerciseRepository;
use App\Repositories\PlannedExerciseRepository;
use App\Repositories\PlannedRoutineRepository;
use App\Repositories\RoutineRepository;
use App\Repositories\UserRepository;
use App\Repositories\WorkoutPlanRepository;
use App\Services\Contracts\RoutineApiServiceContract;
use App\Services\Contracts\RoutineServiceContract;
use App\Services\RoutineApiService;
use App\Services\RoutineService;
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
        $this->app->bind(PlannedExerciseRepositoryContract::class, PlannedExerciseRepository::class);
        $this->app->bind(RoutineApiServiceContract::class, RoutineApiService::class);
        $this->app->bind(RoutineServiceContract::class, RoutineService::class);
        $this->app->bind(WorkoutPlanRepositoryContract::class, WorkoutPlanRepository::class);
        $this->app->bind(PlannedRoutineRepositoryContract::class, PlannedRoutineRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
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
