<?php

namespace App\Http\Requests;

use App\Dtos\RoutineSaveDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RoutineSaveRequest extends FormRequest
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

    public function data(): RoutineSaveDto
    {
        return new RoutineSaveDto([
            'name' => $this->input('name'),
            'description' => $this->input('description'),
        ]);
    }
}
