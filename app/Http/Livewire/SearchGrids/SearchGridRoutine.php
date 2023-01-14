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

    public function renderCard(Model $record, array $cardParams): string
    {
        $params = array_merge($cardParams, [
            'routine' => $record,
            'width' => 9,
        ]);
        $card = new RoutineCard(...$params);
        return $card->render()->with($card->data());
    }
}
