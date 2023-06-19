<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        return view('user.register');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->store($request);
        return redirect()->route('welcome.index');
    }

    public function show($id)
    {
        $viewData = [
            'user' => $this->userService->info($id),
        ];
        return view('user.info')->with($viewData);
    }

    public function edit(User $user)
    {
        $viewData = [
            'user' => $user
        ];
        return view('user.edit')->with($viewData);
    }

    public function update(UpdateUserRequest $request, $user)
    {
        $this->userService->update($request, $user);

        return redirect()->route('user.show', $user);
    }

    public function destroy(DestroyUserRequest $request, $user)
    {
        $this->userService->destroy($user);

        return redirect()->route('welcome.index');
    }
}
