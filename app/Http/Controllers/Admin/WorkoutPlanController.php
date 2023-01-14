<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutPlanSaveRequest;
use App\Models\WorkoutPlan;
use App\Repositories\Contracts\WorkoutPlanRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkoutPlanController extends Controller
{
    public function __construct(private WorkoutPlanRepositoryContract $workoutPlanRepository)
    {
    }

    public function index(Request $request): View
    {
        $params = $request->all();
        $routines = $this->routineRepository->search($params);
        return view('admin.workout-plans.index', compact('routines'));
    }

    public function store(WorkoutPlanSaveRequest $request): RedirectResponse
    {
        $workoutPlan = $this->workoutPlanRepository->create($request->data()->toArray());
        return redirect()->route('workout-plans.show', $workoutPlan)->with('flash_message', __t('common.workout_plan_added', 'Workout plan added!'));
    }

//    public function update(Routine $routine, RoutineSaveRequest $request)
//    {
//        $routine = $this->routineRepository->update($routine, $request->data()->toArray());
//        return redirect()->route('routines.show', $routine)->with('flash_message', __t('common.routine_updated', 'Routine updated!'));
//    }
//    public function edit(Routine $routine): View
//    {
//        return view('admin.routines.edit', compact('routine'));
//    }
//
    public function show(WorkoutPlan $workoutPlan): View
    {
        return view('admin.workout-plans.show', compact('workoutPlan'));
    }
}
