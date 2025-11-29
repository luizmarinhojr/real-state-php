<?php

    namespace App\Model;

    use Exception, DateTimeImmutable;

    final class CustomerModel {
        public ?int $id;
        public string $firstName;
        public string $lastName;
        public ?string $cpf;
        public ?string $birthDate;
        public ?string $email;
        public ?string $cellphone;
        public ?AddressModel $address;
        public ?bool $active;
        public string $createdAt;
        public ?string $modifiedAt;
        public ?string $deletedAt;

        public function __construct(?int $id, string $firstName, string $lastName, ?string $cpf = null ,?string $birthDate = null, ?string $email = null, 
                ?string $cellphone = null, ?AddressModel $address = null, ?bool $active = null, ?string $createdAt = null, 
                ?string $modifiedAt = null, ?string $deletedAt = null) {
            $this->setId($id);
            $this->setFirstName($firstName);
            $this->setLastName($lastName);
            $this->setCpf($cpf);
            $this->setBirthDate($birthDate);
            $this->setEmail($email);
            $this->setCellphone($cellphone);
            $this->setAddress($address);
            $this->setActive($active);
            $this->setModifiedAt($modifiedAt);
            $this->setDeletedAt($deletedAt);
            $this->setCreatedAt($createdAt);
        }

        public function getId(): int {
            return $this->id;
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

        public function getAddress(): ?AddressModel {
            return $this->address;
        }

        public function getCreatedAt(): ?string {
            return $this->createdAt;
        }

        public function getModifiedAt(): ?string {
            return $this->modifiedAt;
        }

        public function getDeletedAt(): ?string {
            return $this->deletedAt;
        }

        private function setId(?int $id): void {
            $this->id = $id;
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
                } else {
                    throw new Exception("Email is not valid", 400);
                }
            } else {
                $this->email = $email;
            }
        }

        public function setCellphone(?string $cellphone): void {
            $this->cellphone = $cellphone;
        }

        public function setAddress(?AddressModel $address): void {
            $this->address = $address;
        }

        public function setActive(?bool $active): void {
            $this->active = $active;
        }

        public function setCreatedAt(?string $createdAt): void {
            $cre = $createdAt ?? new DateTimeImmutable('now');
            $this->createdAt = $cre->format('Y-m-d H:i:s');
        }

        public function setModifiedAt(?string $modifiedAt): void {
            $this->modifiedAt = $modifiedAt;
        }

        public function setDeletedAt(?string $deletedAt): void {
            $this->deletedAt = $deletedAt;
        }
    }
