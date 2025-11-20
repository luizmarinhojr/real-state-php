<?php

namespace App\Controller;

use App\Dto\Request\UserDtoRequest;
use App\Usecase\AuthUsecase;

final class AuthController 
{
    private readonly AuthUsecase $authUsecase;

    public function __construct(AuthUsecase $authUsecase) 
    {
        $this->authUsecase = $authUsecase;
    }

    public function login() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['email'], $_POST['password'])) {
                require_once VIEW . 'pages/400.php';
                exit;
            }
            try {
                $user = new UserDtoRequest($_POST['email'], $_POST['password']);
                $isSuccess = $this->authUsecase->login($user->getEmail(), $user->getPassword());
            } catch (\Exception $e) {
                require_once VIEW . 'pages/400.php';
            }
            exit;
        }
        require_once VIEW . 'pages/login.php';
    }
}
