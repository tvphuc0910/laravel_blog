<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {
    }

    public function store(Request $params): void
    {
        $this->userRepository->store($params->validated());
    }

    public function info($id)
    {
        return $this->userRepository->getInfoById($id);
    }

    public function update(Request $params, $user): void
    {
        $user = User::find($user);
        $user->name = $params->input('name');
        $user->email = $params->input('email');
        $user->password = $params->input('password');

        $this->userRepository->updateById($user);
    }

    public function destroy(int $userId): void
    {
        $this->userRepository->destroyById($userId);
        session()->flush();
    }
}
