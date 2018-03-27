<?php

declare(strict_types = 1);

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Entity\Product;
use OutOfBoundsException;

class Cart
{
    private $items = [];

    /**
     * @param Product $product
     * @param int $quantity
     * @return Cart
     */
    public function addProduct(Product $product, int $quantity): self
    {
        foreach ($this->items as $index => $item) {
            if ($item->getProduct() === $product) {
                $item->setQuantity($item->getQuantity() + $quantity);

                return $this;
            }
        }

        $this->items[] = new Item($product, $quantity);

        return $this;
    }

    /**
     * @param Product $product
     * @return Cart
     */
    public function removeProduct(Product $product): self
    {
        foreach ($this->items as $index => $item) {
            if ($item->getProduct() === $product) {
                array_splice($this->items, $index, 1);
            }
        }

        return $this;
    }

    /**
     * @param Product $product
     * @param int $quantity
     * @return Cart
     */
    public function setQuantity(Product $product, int $quantity): self
    {
        foreach ($this->items as $index => $item) {
            if ($item->getProduct() === $product) {
                $item->setQuantity($quantity);
            }
        }

        return $this;
    }

    /**
     * @param int $index
     * @return Item
     */
    public function getItem(int $index): Item
    {
        if (!array_key_exists($index, $this->items)) {
            throw new OutOfBoundsException();
        }

        return $this->items[$index];
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        $totalPrice = 0;

        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }

        return $totalPrice;
    }
}
