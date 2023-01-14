<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlannedExerciseResource;
use App\Models\PlannedExercise;
use App\Models\Routine;
use App\Repositories\Contracts\PlannedExerciseRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlannedExerciseApiController extends Controller
{

    public function __construct(private PlannedExerciseRepositoryContract $plannedExerciseRepository)
    {
    }

    public function index(Routine $routine): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => PlannedExerciseResource::collection($routine->plannedExercises),
        ]);

    }

    public function update(Request $request, PlannedExercise $plannedExercise): JsonResponse
    {
        //
    }

    public function destroy(PlannedExercise $plannedExercise): JsonResponse
    {
        $this->plannedExerciseRepository->delete($plannedExercise);
        return response()->json(['success' => true,]);
    }
}
