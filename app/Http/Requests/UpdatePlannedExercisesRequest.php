<?php

namespace App\Http\Requests;

use App\Dtos\PlannedExerciseSaveDto;
use App\Enums\TargetType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePlannedExercisesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        return Auth::check();
    }

    public function rules()
    {
        return [
            '*.id' => ['nullable', 'numeric'],
            '*.exercise_id' => ['numeric', 'exists:exercises,id'],
            '*.sets' => ['numeric'],
            '*.target_type' => ['required', 'in:' . implode(',', TargetType::getValues())],
            '*.target' => ['numeric'],
            '*.rest_time' => ['numeric'],
            '*.order' => ['numeric'],
        ];
    }

    public function data(): array
    {
        $data = $this->json()->all();
        return array_map(fn($el): PlannedExerciseSaveDto => new PlannedExerciseSaveDto([
            'id' => $el['id'] ?? null,
            'exercise_id' => (int)$el['exercise_id'],
            'sets' => (int)$el['sets'],
            'target_type' => TargetType::fromValue($el['target_type']),
            'target' => (float)$el['target'],
            'rest_time' => (int)$el['rest_time'],
            'routine_id' => $this->route('routine')->getKey(),
            'order' => (int)$el['order'],
        ]), $data);
    }
}
