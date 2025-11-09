<?php

namespace App\Model;

class AddressModel {
    private ?int $id;
    private ?string $street;
    private ?int $number;
    private ?string $complement;
    private ?string $neighborhood;
    private ?string $city;
    private ?string $cep;

    public function __construct(?int $id, ?string $street, ?int $number, ?string $complement, ?string $neighborhood, ?string $city, ?string $cep) {
        $this->id = $id;
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->cep = $cep;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getStreet(): ?string {
        return $this->street;
    }

    public function getNumber(): ?int {
        return $this->number;
    }

    public function getComplement(): ?string {
        return $this->complement;
    }

    public function getNeighborhood(): ?string {
        return $this->neighborhood;
    }

    public function getCity(): ?string {
        return $this->city;
    }

    public function getCep(): ?string {
        return $this->cep;
    }

    public function setStreet(?string $street): void {
        $this->street = $street;
    }

    public function setNumber(?int $number): void {
        $this->number = $number;
    }

    public function setComplement(?string $complement): void {
        $this->complement = $complement;
    }

    public function setNeighborhood(?string $neighborhood): void {
        $this->neighborhood = $neighborhood;
    }

    public function setCity(?string $city): void {
        $this->city = $city;
    }

    public function setCep(?string $cep): void {
        $this->cep = $cep;
    }
}