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

    public function login(string $username, string $password): bool 
    {
        return true;
    }
}