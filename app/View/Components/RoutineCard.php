<?php

namespace App\View\Components;

use App\Models\Routine;
use Illuminate\View\Component;
use Illuminate\View\View;

class RoutineCard extends Component
{
    public function __construct(
        public Routine $routine,
        public string $class = 'col-12 col-md-4 col-lg-4 my-2',
        public int $width = 18,
    )
    {
    }


    public function render(): View
    {
        return view('components.routine-card');
    }
}
