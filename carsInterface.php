<?php

//namespace Cars;

interface CarsInterface
{
    public function create(array $data): ?int;
    public function get(int $id): array;
    public function getAll(): array;
    public function update(int $id, array $data);
    public function delete(int $id): bool;
}