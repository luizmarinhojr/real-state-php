<?php

namespace App\Controller;

use App\Dto\Request\LoginDtoRequest;
use App\Dto\Request\UserDtoRequest;
use App\Usecase\AuthUsecase;
use Exception;
use Throwable;

final class AuthController 
{
    private readonly AuthUsecase $authUsecase;

    public function __construct(AuthUsecase $authUsecase) 
    {
        $this->authUsecase = $authUsecase;
    }

    final public function signin() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['email'], $_POST['password'])) {
                require_once VIEW . 'pages/400.php';
                exit;
            }
            try {
                $user = new LoginDtoRequest($_POST['email'], $_POST['password']);
                $user = $this->authUsecase->signin($user->getEmail(), $user->getPassword());
                if ($user) {
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user_first_name'] = $user->getFirstName();
                    $_SESSION['user_logged_in'] = true;
                    
                    $_SESSION['flash_message'] = ['type' => 'success', 'message' => 'Logado com sucesso.'];
                    header("Location: /");
                    exit;
                } else {
                    $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Credenciais inválidas.'];
                    header("Location: /login");
                }
            } catch (Throwable $e) {
                $_SESSION['flash_message'] = ['type' => 'error', 'message' => $e->getMessage()];
                header("Location: /login");
            }
            exit;
        }
        require_once VIEW . 'pages/signin.php';
    }

    final public function signup() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['email'], $_POST['password'])) {
                $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'E-mail e senha não podem estar vazios'];
                exit;
            }
            try {
                $user = new UserDtoRequest(
                    $this->getRequiredPostField('first_name'),
                    $this->getRequiredPostField('last_name'),
                    $this->getRequiredPostField('email'), 
                    $this->getRequiredPostField('password')
                );
                $userId = $this->authUsecase->signup($user);
                if ($userId) {
                    $_SESSION['flash_message'] = ['type' => 'success', 'message' => 'Usuário criado com sucesso! Faça o Login agora para continuar'];
                    header("Location: /login");
                    exit;
                }
                $_SESSION['flash_message'] = ['type' => 'error', 'message' => 'Erro ao criar usuário.'];
                header("Location: /cadastrar");
            } catch (Throwable $e) {
                $_SESSION['flash_message'] = ['type' => 'error', 'message' => $e->getMessage()];
                header("Location: /login");
            }
            exit;
        }
        require_once VIEW . 'pages/signup.php';
    }

    private function getRequiredPostField(string $fieldName): string {
        if (!isset($_POST[$fieldName]) || trim($_POST[$fieldName]) === '') {
            throw new Exception("O campo '{$fieldName}' é obrigatório e não foi preenchido.", 400);
        }
        return trim($_POST[$fieldName]);
    }
}
