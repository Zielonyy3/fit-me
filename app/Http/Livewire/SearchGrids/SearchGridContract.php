<?php

namespace App\Http\Livewire\SearchGrids;

interface SearchGridContract
{
    public function getData(array $params = []): \Illuminate\Contracts\Pagination\LengthAwarePaginator;
}
