<?php

namespace App\Http\Livewire;

use App\Http\Livewire\SearchGrids\SearchGridContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class SearchGrid extends Component
{
    public string $search = '';
    public string $message;
    public int $total = 0;
    public int $perPage = 12;
    public int $currentPage = 1;
    public string $class = '';
    public string $title = '';
    public string $pageName = 'page';
    public $renderCard = null;
    private LengthAwarePaginator $records;
    private ?SearchGridContract $classInstance = null;

    public function reload()
    {
        $this->classInstance = $this->getClass();
        $this->records = $this->classInstance->getData($this->getParams());

        $this->total = $this->records->total();
        $this->perPage = $this->records->perPage();
        $this->currentPage = $this->records->currentPage();
        $this->pageName = $this->records->getPageName();

        $this->title = $this->classInstance->getTitle();
    }

    public function updating(): void
    {
        $this->reload();
    }

    public function render()
    {
        $this->reload();
        return view('livewire.search-grid', [
            'records' => $this->records,
            'classInstance' => $this->classInstance
        ]);
    }

    public function changePage($page): void
    {
        $this->currentPage = (int)$page;
        $this->reload();
    }

    private function getClass(): ?SearchGridContract
    {
        if (!empty($this->class)) {
            $class = app()->make($this->class);
            if ($class instanceof SearchGridContract) {
                return $class;
            }
        }
        return null;
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
