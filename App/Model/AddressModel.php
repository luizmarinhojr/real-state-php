<?php

namespace App\Model;

use DateTimeImmutable;

class AddressModel {
    public ?int $id;
    public string $street;
    public int $number;
    public ?string $complement;
    public string $neighborhood;
    public string $city;
    public string $state;
    public string $cep;
    public ?bool $active;
    public string $createdAt;
    public ?string $modifiedAt;
    public ?string $deletedAt;
    
    public function __construct(?int $id, string $street, int $number, ?string $complement, string $neighborhood, string $city, 
            string $cep, string $state, ?bool $active = null, ?string $createdAt = null, ?string $modifiedAt = null, 
            ?string $deletedAt = null) {
        $this->setId($id);
        $this->setStreet($street);
        $this->setNumber($number);
        $this->setComplement($complement);
        $this->setNeighborhood($neighborhood);
        $this->setCity($city);
        $this->setState($state);
        $this->setCep($cep);
        $this->setActive($active);
        $this->setModifiedAt($modifiedAt);
        $this->setDeletedAt($deletedAt);
        $this->setCreatedAt($createdAt);
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

    public function getState(): string {
        return $this->state;
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

    public function setState(string $state): void {
        $this->state = $state;
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