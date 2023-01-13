<?php

namespace App\View\Components;

use App\Models\Exercise;
use Illuminate\View\Component;
use Illuminate\View\View;

class ExerciseCard extends Component
{
    public function __construct(
        public Exercise $exercise,
        public int $width = 18,
    )
    {
    }


    public function render(): View
    {
        return view('components.exercise-card');
    }
}
