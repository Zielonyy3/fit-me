<?php

namespace App\Http\Requests;

use App\Dtos\ExerciseSaveDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ExerciseSaveRequest extends FormRequest
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

    public function data(): ExerciseSaveDto
    {
        return new ExerciseSaveDto([
            'name' => $this->input('name'),
            'owner_id' => Auth::user()->getKey(),
            'description' => $this->input('description'),
        ]);
    }
}
