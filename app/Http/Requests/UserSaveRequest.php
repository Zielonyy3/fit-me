<?php

namespace App\Http\Requests;

use App\Dtos\UserSaveDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserSaveRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'email' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'bio' => ['nullable', 'string'],
        ];
    }

    public function data(): UserSaveDto
    {
        return new UserSaveDto([
            'email' => $this->input('email'),
            'first_name' => $this->input('first_name'),
            'last_name' => $this->input('last_name'),
            'bio' => $this->input('bio'),
        ]);
    }
}
