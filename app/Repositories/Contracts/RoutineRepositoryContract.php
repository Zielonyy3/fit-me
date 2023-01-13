<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RoutineRepositoryContract extends BaseRepositoryContract
{
    public function search(array $params): LengthAwarePaginator;

}
