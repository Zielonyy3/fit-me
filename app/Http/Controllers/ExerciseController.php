<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExerciseSaveRequest;
use App\Models\Exercise;
use App\Repositories\Contracts\ExerciseRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExerciseController extends Controller
{

    public function __construct(private ExerciseRepositoryContract $exerciseRepository)
    {
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


    public function update(Request $request, Exercise $exercise)
    {
        //
    }


    public function destroy(Exercise $exercise)
    {
        //
    }
}
