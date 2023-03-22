<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class DeleteForm extends Component
{
    public string $url = '';

    public function render(): View
    {
        return view('livewire.delete-form',);
    }
}
