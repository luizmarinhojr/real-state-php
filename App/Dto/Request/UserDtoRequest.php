<?php 

namespace App\Dto\Request;

use Exception;

final class UserDtoRequest 
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;

    public function __construct(string $firstName, string $lastName, string $email, string $password) 
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getFirstName(): string 
    {
        return $this->firstName;
    }

    public function getLastName(): string 
    {
        return $this->lastName;
    }

    public function getEmail(): ?string 
    {
        return $this->email;
    }

    public function getPassword(): ?string 
    {
        return $this->password;
    }

    public function setFirstName(string $firstName): void 
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void 
    {
        $this->lastName = $lastName;
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
                $this->password = $password;
            } else {
                throw new Exception("Email is not valid", 400);
            }
        } else {
            throw new Exception("Email is empty",400);
        }
    }
}