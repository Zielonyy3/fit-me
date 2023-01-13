<?php

namespace App\Http\Livewire;

use App\Repositories\Contracts\ExerciseRepositoryContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class ExercisesGrid extends Component
{
    public string $search = '';
    public string $message;
    public int $total = 0;
    public int $perPage = 12;
    public int $currentPage = 1;
    public string $pageName = 'page';
    private LengthAwarePaginator $exercises;

    public function reload()
    {
        $this->exercises = app(ExerciseRepositoryContract::class)->search($this->getParams());
        $this->total = $this->exercises->total();
        $this->perPage = $this->exercises->perPage();
        $this->currentPage = $this->exercises->currentPage();
        $this->pageName = $this->exercises->getPageName();
    }

    public function updating():void
    {
        $this->reload();
    }

    public function render()
    {
        $this->reload();
        return view('livewire.exercises-grid', [
            'exercises' => $this->exercises
        ]);
    }

    public function changePage($page): void
    {
        $this->currentPage = (int)$page;
        $this->reload();
    }

    private function getParams(): array
    {
        $params = ['search' => $this->search];

        return array_merge($params, [
            $this->pageName => $this->currentPage,
            'per_page' => $this->perPage,
        ]);
    }


}
