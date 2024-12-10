<?php

namespace App\Domain\Shop;

interface ShopRepository
{
    public function findById(int $id): ?Shop;
    public function save(Shop $shop): void;
    public function update(Shop $shop): void;
    public function delete(int $id): void;
    public function findAll(): array;
    public function findByFlowerId(int $flowerId): array;
}
