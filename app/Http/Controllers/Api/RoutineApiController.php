<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePlannedExercisesRequest;
use App\Http\Resources\PlannedExerciseResource;
use App\Models\PlannedExercise;
use App\Models\Routine;
use App\Services\Contracts\RoutineApiServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoutineApiController extends Controller
{

    public function __construct(private RoutineApiServiceContract $routineApiService)
    {
    }

    public function updatePlannedExercises(Routine $routine, UpdatePlannedExercisesRequest $request): JsonResponse
    {
        $plannedExercises = $this->routineApiService->updatePlannedExercises($routine, $request->data());
        return response()->json([
            'success' => true,
            'data' => PlannedExerciseResource::collection($plannedExercises),
        ]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PlannedExercise $plannedExercise
     * @return \Illuminate\Http\Response
     */
    public function show(PlannedExercise $plannedExercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PlannedExercise $plannedExercise
     * @return \Illuminate\Http\Response
     */
    public function edit(PlannedExercise $plannedExercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PlannedExercise $plannedExercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlannedExercise $plannedExercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PlannedExercise $plannedExercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlannedExercise $plannedExercise)
    {
        //
    }
}
