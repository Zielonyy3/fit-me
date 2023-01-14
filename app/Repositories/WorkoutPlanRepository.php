<?php

namespace App\Repositories;

use App\Models\Routine;
use App\Models\WorkoutPlan;
use App\Repositories\Contracts\RoutineRepositoryContract;
use App\Repositories\Contracts\WorkoutPlanRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class WorkoutPlanRepository extends BaseRepository implements WorkoutPlanRepositoryContract
{
    public function __construct(WorkoutPlan $model)
    {
        parent::__construct($model);
    }

    public function search(array $params): LengthAwarePaginator
    {
        $workoutPlans = $this->model->newQuery();
        if (!empty($params['search'])) {
            $querySearch = $params['search'];
            $workoutPlans->where(function (Builder $query) use ($querySearch) {
                $query->where('name', 'ILIKE', "%$querySearch%");
            });
        }

        return $workoutPlans->paginate(perPage($params['per_page'] ?? null), ['*'], 'page', $params['page'] ?? 1);
    }

}
