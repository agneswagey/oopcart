<?php

namespace App\Models;

class Cart
{
  /**
   * @var CartItem[]
   */
  private array $items = [];

  public function addProduct(Product $product, int $quantity): CartItem
  {
    // find product in cart
    $cartItem = $this->findCartItem($product->getId());
    if ($cartItem === null)
    {
      $cartItem = new CartItem($product, 0);
      $this->items[] = $cartItem;
    }
    $cartItem->increaseQuantity($quantity);
    return $cartItem;
  }

  public function findCartItem(int $productId): ?CartItem
  {
    foreach ($this->items as $item)
    {
      if ($item->getProduct()->getId() === $productId)
      {
        return $item;
      }
    }
    return null;
  }

  public function removeProduct(Product $product)
  {
    foreach ($this->items as $index => $item)
    {
      if ($item->getProduct()->getId() === $product->getId())
      {
        unset($this->items[$index]);
      }
    }
  }

  public function getTotalQuantity(): int
  {
    $sum = 0;
    foreach ($this->items as $item)
    {
      $sum += $item->getQuantity();
    }
    return $sum;
  }

  public function getTotalSum(): float
  {
    $totalSum = 0;
    foreach ($this->items as $item)
    {
      $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
    }
    return $totalSum;
  }
}