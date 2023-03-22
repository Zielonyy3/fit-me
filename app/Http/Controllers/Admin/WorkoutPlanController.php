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
        return view('admin.workout-plans.index');
    }

    public function store(WorkoutPlanSaveRequest $request): RedirectResponse
    {
        $workoutPlan = $this->workoutPlanRepository->create($request->data()->toArray());
        return redirect()->route('workout-plans.show', $workoutPlan)->with('flash_message', __t('common.workout_plan_added', 'Workout plan added!'));
    }

    public function update(WorkoutPlan $workoutPlan, WorkoutPlanSaveRequest $request)
    {
        $this->workoutPlanRepository->update($workoutPlan, $request->data()->toArray());
        return redirect()->route('workout-plans.show', $workoutPlan)->with('flash_message', __t('common.workout_plan_updated', 'Workout plan updated!'));
    }
    public function edit(WorkoutPlan $workoutPlan): View
    {
        return view('admin.workout-plans.edit', compact('workoutPlan'));
    }

    public function show(WorkoutPlan $workoutPlan): View
    {
        return view('admin.workout-plans.show', compact('workoutPlan'));
    }


    public function destroy(WorkoutPlan $workoutPlan): RedirectResponse
    {
        $success = $this->workoutPlanRepository->delete($workoutPlan);
        if ($success) {
            return back()->with('flash_message', __t('common.workout_plan_deleted', 'Workout plan deleted!'));
        }
        return back()->with('error_message', __t('common.workout_plan_not_deleted', 'Workout plan not deleted!'));
    }
}
