<?php

namespace App\Dto\Request;

use Exception, DateTimeImmutable;

final class CustomerDtoRequest {
    private string $firstName;
    private string $lastName;
    private ?string $cpf;
    private ?string $birthDate;
    private ?string $email;
    private ?string $cellphone;
    private ?AddressDtoRequest $address;

    public function __construct(string $firstName, string $lastName, ?string $cpf = null, ?string $birthDate = null, ?string $email = null, 
            ?string $cellphone = null, ?AddressDtoRequest $address = null) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setCpf($cpf);
        $this->setBirthDate($birthDate);
        $this->setEmail($email);
        $this->setCellphone($cellphone);
        $this->setAddress($address);
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getCpf(): ?string {
        return $this->cpf;
    }

    public function getBirthDate(): ?string {
        return $this->birthDate;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getCellphone(): ?string {
        return $this->cellphone;
    }

    public function getAddress(): ?AddressDtoRequest {
        return $this->address;
    }

    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function setCpf(?string $cpf): void {
        $this->cpf = $cpf;
    }

    public function setBirthDate(?string $birthDate): void {
        $this->birthDate = $birthDate;
    }

    public function setEmail(?string $email): void {
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->email = $email;
                return;
            }
            throw new Exception("Email is not valid", 400);
        } else {
            $this->email = $email;
        }
        
    }

    public function setCellphone(?string $cellphone): void {
        $this->cellphone = $cellphone;
    }

    public function setAddress(?AddressDtoRequest $address): void {
        $this->address = $address;
    }
}