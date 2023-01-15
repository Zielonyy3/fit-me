<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlannedRoutineSaveRequest;
use App\Http\Resources\PlannedRoutineResource;
use App\Models\PlannedRoutine;
use App\Models\WorkoutPlan;
use App\Repositories\Contracts\PlannedRoutineRepositoryContract;
use Illuminate\Http\JsonResponse;

class PlannedRoutineApiController extends Controller
{

    public function __construct(private PlannedRoutineRepositoryContract $plannedRoutineRepository)
    {
    }

    public function store(WorkoutPlan $workoutPlan, PlannedRoutineSaveRequest $request): JsonResponse
    {
        $plannedRoutine = $this->plannedRoutineRepository->store($workoutPlan, $request->data());
        return response()->json([
            'success' => true,
            'data' => new PlannedRoutineResource($plannedRoutine)
        ]);
    }
    public function update(PlannedRoutine $plannedRoutine, PlannedRoutineSaveRequest $request): JsonResponse
    {
        $this->plannedRoutineRepository->update($plannedRoutine, $request->data()->toArray());
        return response()->json([
            'success' => true,
            'data' => new PlannedRoutineResource($plannedRoutine->fresh())
        ]);
    }
}
