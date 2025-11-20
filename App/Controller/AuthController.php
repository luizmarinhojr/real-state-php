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

    public function signin() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['email'], $_POST['password'])) {
                require_once VIEW . 'pages/400.php';
                exit;
            }
            try {
                $user = new UserDtoRequest($_POST['email'], $_POST['password']);
                $userId = $this->authUsecase->signin($user->getEmail(), $user->getPassword());
                if ($userId) {
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['user_logged_in'] = true;
                    
                    header("Location: /dashboard");
                    exit;
                } else {
                    $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Credenciais inválidas.'];
                }
            } catch (\Exception $e) {
                $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Erro interno. Tente novamente.'];
            }
            exit;
        }
        require_once VIEW . 'pages/login.php';
    }

    public function signup() 
    {
        if ($_SERVER[''] === 'POST') {
            exit;
        }
        require_once VIEW . 'pages/signup.php';
    }
}
