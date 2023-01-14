<?php

namespace App\Repositories;

use App\Models\Routine;
use App\Repositories\Contracts\RoutineRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class RoutineRepository extends BaseRepository implements RoutineRepositoryContract
{
    public function __construct(Routine $model)
    {
        parent::__construct($model);
    }

    public function search(array $params): LengthAwarePaginator
    {
        $routines = $this->model->newQuery();
        if (!empty($params['search'])) {
            $querySearch = $params['search'];
            $routines->where(function (Builder $query) use ($querySearch) {
                $query->where('name', 'ILIKE', "%$querySearch%");
            });
        }

        return $routines->paginate(perPage($params['per_page'] ?? null), ['*'], 'page', $params['page'] ?? 1);
    }

}
