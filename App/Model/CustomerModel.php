<?php

    namespace App\Model;

    class CustomerModel {
        private int $id;
        private string $name;
        private string $birthDate;
        private string $email;
        private string $cellphone;

        public function __construct(int $id, string $name, string $birthDate, string $email, string $cellphone) {
            $this->setId($id);
            $this->setName($name);
            $this->setBirthDate($birthDate);
            $this->setEmail($email);
            $this->setCellphone($cellphone);
        }

        public function getId(): int {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getBirthDate(): string {
            return $this->birthDate;
        }

        public function getEmail(): string {
            return $this->email;
        }

        public function getCellphone(): string {
            return $this->cellphone;
        }

        private function setId(int $id): void {
            $this->id = $id;
        }

        public function setName(string $name): void {
            $this->name = $name;
        }

        public function setBirthDate(string $birthDate): void {
            $this->birthDate = $birthDate;
        }

        public function setEmail(string $email): void {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->email = $email;
                echo "Valid Email!";
            } else {
                throw new Exception("Email is not valid", 400);
            }
        }

        public function setCellphone(string $cellphone): void {
            $this->cellphone = $cellphone;
        }
    }
