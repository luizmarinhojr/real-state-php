<?php 

namespace App\Usecase;

use App\Dto\Response\UserDtoResponse;
use App\Model\UserModel;
use App\Repository\AuthRepository;
use App\Dto\Request\UserDtoRequest;

final class AuthUsecase 
{
    private readonly AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function signin(string $username, string $password): ?UserDtoResponse 
    {
        $userRow = $this->authRepository->getByEmail($username);
        if (!$userRow) {
            return null;
        }
        $passwordHash = $userRow['password_hash'];

        if (password_verify($password, $passwordHash)) {
            $user = new UserDtoResponse($userRow['id'], $userRow['first_name'], null, $userRow['email']);
            return $user;
        }

        return null;
    }

    public function signup(UserDtoRequest $userRequest): ?int 
    {
        $passwordHash = password_hash($userRequest->getPassword(), PASSWORD_DEFAULT);
        $userModel = new UserModel(null, $userRequest->getFirstName(), 
                    $userRequest->getLastName(), $userRequest->getEmail(), $passwordHash);
        $userId = $this->authRepository->insert($userModel);
        if ($userId) {
            return $userId;
        }
        return null;
    }
}