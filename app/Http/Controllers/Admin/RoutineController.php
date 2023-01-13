<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoutineSaveRequest;
use App\Models\Routine;
use App\Repositories\Contracts\RoutineRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoutineController extends Controller
{
    public function __construct(private RoutineRepositoryContract $routineRepository)
    {
    }

    public function index(Request $request): View
    {
        $params = $request->all();
        $routines = $this->routineRepository->search($params);
        return view('admin.routines.index', compact('routines'));
    }

    public function store(RoutineSaveRequest $request): RedirectResponse
    {
        $routine = $this->routineRepository->create($request->data()->toArray());
        return redirect()->route('routines.show', $routine)->with('flash_message', __t('common.routine_added', 'Routine added!'));
    }

    public function edit(Routine $routine): View
    {
        return view('admin.routines.edit', compact('routine'));
    }

    public function show(Routine $routine): View
    {
        return view('admin.routines.show', compact('routine'));
    }
}
