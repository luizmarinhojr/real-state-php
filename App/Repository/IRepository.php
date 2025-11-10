<?php
namespace App\Repository;

interface IRepository {
    public function fetchAll(): ?array;
    public function fetch(int $id): ?object;
    public function update(object $entity): bool;
    public function delete(int $id): bool;
}