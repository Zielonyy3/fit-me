<?php

namespace App\Http\Livewire\SearchGrids;

use App\Repositories\Contracts\ExerciseRepositoryContract;
use App\View\Components\ExerciseCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchGridExercise implements SearchGridContract
{
    public function getTitle(): string
    {
        return __('common.exercises');
    }
    public function getData(array $params = []): LengthAwarePaginator
    {
        return app(ExerciseRepositoryContract::class)->search($params);
    }

    public function renderCard(Model $record): string
    {
        $card = new ExerciseCard(
            exercise: $record,
            width: 9,
        );
        return $card->render()->with($card->data());
    }
}
