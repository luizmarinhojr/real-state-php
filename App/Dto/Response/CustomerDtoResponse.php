<?php
    namespace App\Dto\Response;

    use DateTime, DateTimeImmutable, Exception;

    final class CustomerDtoResponse {
        private ?int $id;
        private ?string $firstName;
        private ?string $lastName;
        private ?string $cpf;
        private ?string $birthDate;
        private ?string $email;
        private ?string $cellphone;
        private ?AddressDtoResponse $address;
        private ?bool $active;
        private ?string $createdAt;
        private ?string $modifiedAt;
        private ?string $deletedAt;

        public function __construct(?int $id = null, ?string $firstName = null, ?string $lastName = null, ?string $cpf = null, ?string $birthDate = null, ?string $email = null, 
                ?string $cellphone = null, ?AddressDtoResponse $address = null, ?string $createdAt = null, ?string $modifiedAt = null, 
                ?string $deletedAt = null) {
            $this->setId($id);
            $this->setFirstName($firstName);
            $this->setLastName($lastName);
            $this->setCpf($cpf);
            $this->setBirthDate($birthDate);
            $this->setEmail($email);
            $this->setCellphone($cellphone);
            $this->setAddress($address);
            $this->setCreatedAt($createdAt);
            $this->setModifiedAt($modifiedAt);
            $this->setDeletedAt($deletedAt);
        }

        public function getId(): ?int {
            return $this->id;
        }

        public function getFirstName(): ?string {
            return $this->firstName;
        }

        public function getLastName(): ?string {
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

        public function getAddress(): ?AddressDtoResponse {
            return $this->address;
        }

        public function getCreatedAt(): ?DateTime {
            return $this->createdAt;
        }

        public function getModifiedAt(): ?DateTime {
            return $this->modifiedAt;
        }

        public function getDeletedAt(): ?DateTime {
            return $this->deletedAt;
        }

        private function setId(?int $id): void {
            $this->id = $id;
        }

        public function setFirstName(?string $firstName): void {
            $this->firstName = $firstName;
        }
        
        public function setLastName(?string $lastName): void {
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

        public function setAddress(?AddressDtoResponse $address): void {
            $this->address = $address;
        }

        public function setCreatedAt(?string $createdAt): void {
            $this->createdAt = $createdAt;
        }

        public function setModifiedAt(?string $modifiedAt): void {
            $this->modifiedAt = $modifiedAt;
        }

        public function setDeletedAt(?string $deletedAt): void {
            $this->deletedAt = $deletedAt;
        }
        
    }
