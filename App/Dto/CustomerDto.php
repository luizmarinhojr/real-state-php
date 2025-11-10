<?php
    namespace App\Dto;

    use Exception;

    final class CustomerDto {
        private ?int $id;
        private ?string $name;
        private ?string $birthDate;
        private ?string $email;
        private ?string $cellphone;
        private ?AddressDto $address;

        public function __construct(?int $id, ?string $name, ?string $birthDate, ?string $email, ?string $cellphone, ?AddressDto $address) {
            $this->setId($id);
            $this->setName($name);
            $this->setBirthDate($birthDate);
            $this->setEmail($email);
            $this->setCellphone($cellphone);
            $this->setAddress($address);
        }

        public function getId(): ?int {
            return $this->id;
        }

        public function getName(): ?string {
            return $this->name;
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

        public function getAddress(): ?AddressDto {
            return $this->address;
        }

        private function setId(?int $id): void {
            $this->id = $id;
        }

        public function setName(?string $name): void {
            $this->name = $name;
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

        public function setAddress(?AddressDto $address): void {
            $this->address = $address;
        }
    }
