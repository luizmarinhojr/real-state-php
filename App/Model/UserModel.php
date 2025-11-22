<?php 

namespace App\Model;

use DateTimeImmutable, Exception;

final class UserModel 
{
    public ?int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $passwordHash;
    public ?bool $active;
    public string $createdAt;
    public ?string $modifiedAt;
    public ?string $deletedAt;

    public function __construct(?int $id, string $firstName, string $lastName, string $email, string $passwordHash, ?bool $active = null, ?string $createdAt = null, 
        ?string $modifiedAt = null, ?string $deletedAt = null) 
    {
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPassword($passwordHash);
        $this->setActive($active);
        $this->setModifiedAt($modifiedAt);
        $this->setDeletedAt($deletedAt);
        $this->setCreatedAt($createdAt);
    }

    public function getId(): int 
    {
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

    public function getPassword(): ?string 
    {
        return $this->passwordHash;
    }

    public function getCreatedAt(): ?string 
    {
        return $this->createdAt;
    }

    public function getModifiedAt(): ?string 
    {
        return $this->modifiedAt;
    }

    public function getDeletedAt(): ?string 
    {
        return $this->deletedAt;
    }

    private function setId(?int $id): void 
    {
        $this->id = $id;
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
            throw new Exception("Password is not valid", 400);
        }
    }

    public function setPassword(string $passwordHash): void 
    {
        $this->passwordHash = $passwordHash;
    }

    public function setActive(?bool $active): void 
    {
        $this->active = $active;
    }

    public function setCreatedAt(?string $createdAt): void 
    {
        $cre = $createdAt ?? new DateTimeImmutable('now');
        $this->createdAt = $cre->format('Y-m-d H:i:s');
    }

    public function setModifiedAt(?string $modifiedAt): void 
    {
        $this->modifiedAt = $modifiedAt;
    }

    public function setDeletedAt(?string $deletedAt): void 
    {
        $this->deletedAt = $deletedAt;
    }


}