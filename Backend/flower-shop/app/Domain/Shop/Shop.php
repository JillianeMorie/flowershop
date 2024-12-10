<?php

namespace App\Domain\Shop;

class Shop
{
    private int $id;
    private int $flowerId;
    private string $image;
    private string $name;
    private string $description;
    private int $price;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(
        int $flowerId,
        string $image,
        string $name,
        string $description,
        int $price
    ) {
        $this->flowerId = $flowerId;
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getFlowerId(): int
    {
        return $this->flowerId;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    // Setters with validation
    public function updatePrice(int $price): void
    {
        if ($price < 0) {
            throw new \InvalidArgumentException('Price cannot be negative');
        }
        $this->price = $price;
    }

    public function updateDescription(string $description): void
    {
        if (empty($description)) {
            throw new \InvalidArgumentException('Description cannot be empty');
        }
        $this->description = $description;
    }
}
