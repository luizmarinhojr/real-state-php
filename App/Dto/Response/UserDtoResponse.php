<?php 

namespace App\Dto\Response;

use Exception;

final class UserDtoResponse
{
    private ?int $id;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $email;

    public function __construct(?int $id, ?string $firstName, ?string $lastName, ?string $email) 
    {
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
    }

    public function getId(): ?int {
        return $this->id;
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

    private function setId(?int $id): void {
        $this->id = $id;
    }

    public function setFirstName(?string $firstName): void 
    {
        $this->firstName = $firstName;
    }

    public function setLastName(?string $lastName): void 
    {
        $this->lastName = $lastName;
    }

    public function setEmail(?string $email): void 
    {
        $this->email = $email;
    }
}