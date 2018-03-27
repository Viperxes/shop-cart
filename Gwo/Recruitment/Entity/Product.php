<?php

declare(strict_types = 1);

namespace Gwo\Recruitment\Entity;

use InvalidArgumentException;

class Product
{
    const DEFAULT_MINIMUM_QUANTITY = 1;
    const DEFAULT_MINIMUM_UNIT_PRICE = 0.01;

    private $id;
    private $name;
    private $unitPrice;
    private $minimumQuantity = self::DEFAULT_MINIMUM_QUANTITY;

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setUnitPrice(float $price): self
    {
        if ($price < self::DEFAULT_MINIMUM_UNIT_PRICE) {
            throw new InvalidArgumentException();
        }

        $this->unitPrice = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * @param int $quantity
     * @return Product
     */
    public function setMinimumQuantity(int $quantity): self
    {
        if ($quantity < self::DEFAULT_MINIMUM_QUANTITY) {
            throw new InvalidArgumentException();
        }

        $this->minimumQuantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumQuantity():  int
    {
        return $this->minimumQuantity;
    }
}
