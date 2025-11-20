<?php 

namespace App\Usecase;

use App\Model\UserModel;
use App\Repository\AuthRepository;

final class AuthUsecase 
{
    private readonly AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function signin(string $username, string $password): ?int 
    {
        $userRow = $this->authRepository->getByEmail($username);
        if (!$userRow) {
            return null;
        }
        $passwordHash = $userRow['password_hash'];
        $userId = $userRow['id'];

        if (password_verify($password, $passwordHash)) {
            return $userId;
        }

        return null;
    }

    public function signup(string $email, string $password): ?int 
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $userModel = new UserModel(null, $email, $passwordHash);
        $userId = $this->authRepository->insert($userModel);
        if ($userId) {
            return $userId;
        }
        return null;
    }
}