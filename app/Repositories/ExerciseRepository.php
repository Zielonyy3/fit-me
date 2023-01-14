<?php

namespace App\Repositories;

use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ExerciseRepository extends BaseRepository implements ExerciseRepositoryContract
{
    public function __construct(Exercise $model)
    {
        parent::__construct($model);
    }

    public function search(array $params): LengthAwarePaginator
    {
        $exercises = $this->model->newQuery();
        if (!empty($params['search'])) {
            $querySearch = $params['search'];
            $exercises->where(function (Builder $query) use ($querySearch) {
                $query->where('name', 'ILIKE', "%$querySearch%");
            });
        }
        return $exercises->paginate(perPage($params['per_page'] ?? null), ['*'], 'page', $params['page'] ?? 1);
    }

}
