<?php

namespace App\Http\Requests;

use App\Dtos\WorkoutPlanSaveDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WorkoutPlanSaveRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string']
        ];
    }

    public function data(): WorkoutPlanSaveDto
    {
        return new WorkoutPlanSaveDto([
            'name' => $this->input('name'),
            'owner_id' => Auth::user()->getKey(),
            'description' => $this->input('description'),
        ]);
    }
}
