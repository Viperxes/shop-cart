<?php

declare(strict_types = 1);

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Entity\Product;
use Gwo\Recruitment\Cart\Exception\QuantityTooLowException;

class Item
{
    private $product;
    private $quantity;

    /**
     * Item constructor.
     * @param Product $product
     * @param int $quantity
     * @throws QuantityTooLowException
     */
    public function __construct(Product $product, int $quantity)
    {
        if ($quantity < $product->getMinimumQuantity()) {
            throw new QuantityTooLowException();
        }

        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param int $quantity
     * @return Item
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->product->getUnitPrice() * $this->quantity;
    }
}
