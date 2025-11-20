<?php 

namespace App\Usecase;

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
        if (strlen($password) >= 8) {
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
        return false;
    }
}