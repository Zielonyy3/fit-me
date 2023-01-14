<?php

namespace App\View\Components;

use App\Models\Routine;
use Illuminate\View\Component;
use Illuminate\View\View;

class RoutineCard extends Component
{
    public function __construct(
        public Routine $routine,
        public string $class = 'col-md-6 col-lg-3',
        public bool $showFooter = true,
        public bool $showDescription = true,
        public int $width = 18,
    )
    {
    }


    public function render(): View
    {
        return view('components.routine-card');
    }
}
