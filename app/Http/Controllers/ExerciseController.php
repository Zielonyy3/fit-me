<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExerciseSaveRequest;
use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExerciseController extends Controller
{

    public function __construct(private ExerciseRepositoryContract $exerciseRepository)
    {
    }

    public function index()
    {
        return view('admin.exercises.index');
    }

    public function store(ExerciseSaveRequest $request): RedirectResponse
    {
        $exercise = $this->exerciseRepository->create($request->data()->toArray());
        return redirect()->route('exercises.show', $exercise)->with('flash_message', __t('common.exercise_added', 'Exercise added!'));
    }

    public function show(Exercise $exercise): View
    {
        return view('admin.exercises.show', compact('exercise'));
    }

    public function edit(Exercise $exercise): View
    {
        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(Exercise $exercise, ExerciseSaveRequest $request): RedirectResponse
    {
        $this->exerciseRepository->update($exercise, $request->data()->toArray());
        return redirect()->route('exercises.show', $exercise)->with('flash_message', __t('common.exercise_updated', 'Exercise updated!'));
    }

    public function destroy(Exercise $exercise): RedirectResponse
    {
        $success = $this->exerciseRepository->delete($exercise);
        if ($success) {
            return back()->with('flash_message', __t('common.exercise_deleted', 'Exercise deleted!'));
        }
        return back()->with('error_message', __t('common.exercise_not_deleted', 'Exercise not deleted!'));
    }
}
