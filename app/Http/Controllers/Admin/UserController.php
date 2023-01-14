<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoutineSaveRequest;
use App\Models\Routine;
use App\Models\User;
use App\Repositories\Contracts\RoutineRepositoryContract;
use App\Services\Contracts\RoutineServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
//    public function __construct(private RoutineRepositoryContract $routineRepository, private RoutineServiceContract $routineService)
//    {
//    }
//
//    public function index(Request $request): View
//    {
//        $params = $request->all();
//        $routines = $this->routineRepository->search($params);
//        return view('admin.routines.index', compact('routines'));
//    }
//
//    public function store(RoutineSaveRequest $request): RedirectResponse
//    {
//        $routine = $this->routineService->create($request->data());
//        return redirect()->route('routines.show', $routine)->with('flash_message', __t('common.routine_added', 'Routine added!'));
//    }
//
//    public function update(Routine $routine, RoutineSaveRequest $request)
//    {
//        $routine = $this->routineRepository->update($routine, $request->data()->toArray());
//        return redirect()->route('routines.show', $routine)->with('flash_message', __t('common.routine_updated', 'Routine updated!'));
//    }
//    public function edit(Routine $routine): View
//    {
//        return view('admin.routines.edit', compact('routine'));
//    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }
}
