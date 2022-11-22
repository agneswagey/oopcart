<?php

namespace App\Models;

class Product
{
  private int $id;
  private string $title;
  private float $price;
  private int $availableQuantity;

  /**
   * @param int $id
   * @param string $title
   * @param float $price
   * @param int $availableQuantity
   */
  public function __construct(int $id, string $title, float $price, int $availableQuantity)
  {
    $this->id = $id;
    $this->title = $title;
    $this->price = $price;
    $this->availableQuantity = $availableQuantity;
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): self
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle(string $title): self
  {
    $this->title = $title;
    return $this;
  }

  /**
   * @return float
   */
  public function getPrice(): float
  {
    return $this->price;
  }

  /**
   * @param float $price
   */
  public function setPrice(float $price): self
  {
    $this->price = $price;
    return $this;
  }

  /**
   * @return int
   */
  public function getAvailableQuantity(): int
  {
    return $this->availableQuantity;
  }

  /**
   * @param int $availableQuantity
   */
  public function setAvailableQuantity(int $availableQuantity): self
  {
    $this->availableQuantity = $availableQuantity;
    return $this;
  }

  public function addToCart(Cart $cart, int $quantity): CartItem
  {
    return $cart->addProduct($this, $quantity);
  }

  public function removeFromCart(Cart $cart)
  {
    return $cart->removeProduct($this);
  }

}