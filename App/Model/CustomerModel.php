<?php

    namespace App\Model;

    use Exception, DateTimeImmutable;

    final class CustomerModel {
        private int $id;
        private string $firstName;
        private string $lastName;
        private ?string $birthDate;
        private ?string $email;
        private ?string $cellphone;
        private ?AddressModel $address;
        private ?bool $active;
        private readonly DateTimeImmutable $createdAt;
        private ?DateTimeImmutable $modifiedAt;
        private ?DateTimeImmutable $deletedAt;

        public function __construct(?int $id, string $firstName, string $lastName, ?string $birthDate = null, ?string $email = null, 
                ?string $cellphone = null, ?AddressModel $address = null, ?bool $active = null, ?DateTimeImmutable $createdAt = null, 
                ?DateTimeImmutable $modifiedAt = null, ?DateTimeImmutable $deletedAt = null) {
            $this->setId($id);
            $this->setFirstName($firstName);
            $this->setLastName($lastName);
            $this->setBirthDate($birthDate);
            $this->setEmail($email);
            $this->setCellphone($cellphone);
            $this->setAddress($address);
            $this->setActive($active);
            $this->setModifiedAt($modifiedAt);
            $this->setDeletedAt($deletedAt);
            $this->createdAt = $createdAt ?? new DateTimeImmutable('now');
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

        public function getCreatedAt(): ?DateTimeImmutable {
            return $this->createdAt;
        }

        public function getModifiedAt(): ?DateTimeImmutable {
            return $this->modifiedAt;
        }

        public function getDeletedAt(): ?DateTimeImmutable {
            return $this->deletedAt;
        }

        private function setId(int $id): void {
            $this->id = $id;
        }

        public function setFirstName(string $firstName): void {
            $this->firstNname = $firstName;
        }

        public function setLastName(string $lastName): void {
            $this->lastName = $lastName;
        }

        public function setBirthDate(string $birthDate): void {
            $this->birthDate = $birthDate;
        }

        public function setEmail(string $email): void {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->email = $email;
            } else {
                throw new Exception("Email is not valid", 400);
            }
        }

        public function setCellphone(string $cellphone): void {
            $this->cellphone = $cellphone;
        }

        public function setAddress(AddressModel $address): void {
            $this->address = $address;
        }

        public function setActive(?bool $active): void {
            $this->active = $active;
        }

        public function setModifiedAt(?DateTimeImmutable $modifiedAt): void {
            $this->modifiedAt = $modifiedAt;
        }

        public function setDeletedAt(?DateTimeImmutable $deletedAt): void {
            $this->deletedAt = $deletedAt;
        }
    }
