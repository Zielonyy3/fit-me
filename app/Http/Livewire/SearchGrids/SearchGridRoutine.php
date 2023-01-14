<?php

namespace App\Http\Livewire\SearchGrids;

use App\Repositories\Contracts\ExerciseRepositoryContract;
use App\Repositories\Contracts\RoutineRepositoryContract;
use App\View\Components\ExerciseCard;
use App\View\Components\RoutineCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchGridRoutine implements SearchGridContract
{
    public function getTitle(): string
    {
        return __('common.routines');
    }
    public function getData(array $params = []): LengthAwarePaginator
    {
        return app(RoutineRepositoryContract::class)->search($params);
    }

    public function renderCard(Model $record): string
    {
        $card = new RoutineCard(
            routine: $record,
            width: 9,
        );
        return $card->render()->with($card->data());
    }
}
