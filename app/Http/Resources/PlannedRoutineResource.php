<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlannedRoutineResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->getKey(),
            'workout_plan_id' => $this->workout_plan_id,
            'routine_id' => $this->workout_plan_id,
            'name' => $this->name,
            'start_day' => $this->start_day,
            'end_day' => $this->end_day,
            'notes' => $this->notes,
        ];
    }
}
