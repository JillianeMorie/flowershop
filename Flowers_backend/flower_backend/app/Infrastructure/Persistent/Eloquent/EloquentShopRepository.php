<?php

namespace App\Infrastructure\Persistent\Eloquent;

use App\Domain\Shop\Shop;
use App\Domain\Shop\ShopRepository;

class EloquentShopRepository implements ShopRepository
{
    private ShopModel $model;

    public function __construct(ShopModel $model)
    {
        $this->model = $model;
    }

    public function findById(int $id): ?Shop
    {
        $shopModel = $this->model->find($id);
        if (!$shopModel) {
            return null;
        }
        return $this->toEntity($shopModel);
    }

    public function save(Shop $shop): void
    {
        $this->model->create([
            'flowerId' => $shop->getFlowerId(),
            'image' => $shop->getImage(),
            'name' => $shop->getName(),
            'description' => $shop->getDescription(),
            'price' => $shop->getPrice(),
        ]);
    }

    public function update(Shop $shop): void
    {
        $this->model->where('id', $shop->getId())
            ->update([
                'flowerId' => $shop->getFlowerId(),
                'image' => $shop->getImage(),
                'name' => $shop->getName(),
                'description' => $shop->getDescription(),
                'price' => $shop->getPrice(),
            ]);
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }

    public function findAll(): array
    {
        return $this->model->all()
            ->map(fn($model) => $this->toEntity($model))
            ->toArray();
    }

    public function findByFlowerId(int $flowerId): array
    {
        return $this->model->where('flowerId', $flowerId)
            ->get()
            ->map(fn($model) => $this->toEntity($model))
            ->toArray();
    }

    private function toEntity(ShopModel $model): Shop
    {
        $shop = new Shop(
            $model->flowerId,
            $model->image,
            $model->name,
            $model->description,
            $model->price
        );

        // Reflection to set protected properties
        $reflection = new \ReflectionClass($shop);

        $idProperty = $reflection->getProperty('id');
        $idProperty->setAccessible(true);
        $idProperty->setValue($shop, $model->id);

        $createdAtProperty = $reflection->getProperty('createdAt');
        $createdAtProperty->setAccessible(true);
        $createdAtProperty->setValue($shop, new \DateTime($model->created_at));

        $updatedAtProperty = $reflection->getProperty('updatedAt');
        $updatedAtProperty->setAccessible(true);
        $updatedAtProperty->setValue($shop, new \DateTime($model->updated_at));

        return $shop;
    }
}
