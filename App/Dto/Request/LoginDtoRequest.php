<?php

namespace App\Dto\Request;

use Exception;

final class LoginDtoRequest
{
    private string $email;
    private string $passwordHash;

    public function __construct(string $email, string $passwordHash) 
    {
        $this->setEmail($email);
        $this->setPassword($passwordHash);
    }

    public function getEmail(): ?string 
    {
        return $this->email;
    }

    public function getPassword(): ?string 
    {
        return $this->passwordHash;
    }

    public function setEmail(string $email): void 
    {
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->email = $email;
            } else {
                throw new Exception("Email is not valid", 400);
            }
        } else {
            throw new Exception("Email is empty",400);
        }
    }

    public function setPassword(string $password): void 
    {
        if (!empty($password)) {
            if (strlen($password) >= 8 && strlen($password) <= 30) {
                $this->passwordHash = $password;
            } else {
                throw new Exception("Email is not valid", 400);
            }
        } else {
            throw new Exception("Email is empty",400);
        }
    }
}