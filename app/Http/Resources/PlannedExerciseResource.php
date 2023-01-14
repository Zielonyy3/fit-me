<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlannedExerciseResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->getKey(),
            'name' => $this->exercise->name,
            'exercise_id' => $this->exercise->getKey(),
            'sets' => $this->sets,
            'target_type' => $this->target_type,
            'target' => $this->target,
            'rest_time' => $this->rest_time,
            'notes' => $this->notes,
            'order' => $this->order,
        ];
    }
}
