<?php

namespace App\Http\Requests;

use App\Dtos\AttachRoutineDto;
use App\Dtos\PlannedRoutineSaveDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PlannedRoutineSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        return Auth::check();
    }

    public function rules()
    {
        return [
            'routine_id' => ['numeric', 'exists:routines,id'],
            'name' => ['nullable', 'string'],
            'start_day' => ['required', 'numeric'],
            'end_day' => ['required', 'numeric'],
            'notes' => ['nullable', 'string']
        ];
    }

    public function data(): PlannedRoutineSaveDto
    {
        return new PlannedRoutineSaveDto([
            'routine_id' => (int)$this->input('routine_id'),
            'name' => $this->input('name'),
            'start_day' => (int)$this->input('start_day'),
            'end_day' => (int)$this->input('end_day'),
            'notes' => $this->input('notes'),
        ]);
    }
}
