<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSaveRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private UserRepositoryContract $userRepository)
    {
    }

    public function index(Request $request): View
    {
        return view('admin.users.index');
    }

    public function update(User $user, UserSaveRequest $request): RedirectResponse
    {
        $this->userRepository->update($user, $request->data()->toArray());
        return redirect()->route('users.edit', $user)->with('flash_message', __t('common.user_updated', 'User updated!'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }


    public function destroy(User $user): RedirectResponse
    {
        $success = $this->userRepository->delete($user);
        if ($success) {
            return back()->with('flash_message', __t('common.user_deleted', 'User deleted!'));
        }
        return back()->with('error_message', __t('common.user_not_deleted', 'User not deleted!'));
    }
}
