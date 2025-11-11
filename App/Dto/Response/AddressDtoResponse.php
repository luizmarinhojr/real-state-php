<?php

namespace App\Dto\Response;

use DateTimeImmutable;

final class AddressDtoResponse {
    private ?int $id;
    private ?string $street;
    private ?int $number;
    private ?string $complement;
    private ?string $neighborhood;
    private ?string $city;
    private ?string $cep;
    private ?string $state;
    private ?bool $active;
    private readonly ?string $createdAt;
    private ?string $modifiedAt;
    private ?string $deletedAt;

    public function __construct(?int $id = null, ?string $street = null, ?int $number = null, ?string $complement = null, ?string $neighborhood = null, 
            ?string $city = null, ?string $cep = null, ?string $state = null, ?bool $active = null, ?DateTimeImmutable $createdAt = null, 
            ?DateTimeImmutable $modifiedAt = null, ?DateTimeImmutable $deletedAt = null) {
        $this->setId($id);
        $this->setStreet($street);
        $this->setNumber($number);
        $this->setComplement($complement);
        $this->setNeighborhood($neighborhood);
        $this->setCity($city);
        $this->setState($state);
        $this->setCep($cep);
        $this->setActive($active);
        $this->setCreatedAt($createdAt);
        $this->setModifiedAt($modifiedAt);
        $this->setDeletedAt($deletedAt);
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

    public function getState(): ?string {
        return $this->state;
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

    public function setState(?string $state): void {
        $this->state = $state;
    }

    public function setActive(?bool $active): void {
        $this->active = $active;
    }

    public function setCreatedAt(?DateTimeImmutable $createdAt): void {
        $this->createdAt = !$createdAt ?? $createdAt->format('Y-m-d H:i:s');
    }

    public function setModifiedAt(?DateTimeImmutable $modifiedAt): void {
        $this->modifiedAt = !$modifiedAt ?? $modifiedAt->format('Y-m-d H:i:s');
    }

    public function setDeletedAt(?DateTimeImmutable $deletedAt): void {
        $this->deletedAt = !$deletedAt ?? $deletedAt->format('Y-m-d H:i:s');
    }
}