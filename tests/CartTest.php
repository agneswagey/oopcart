<?php

use App\Models\Cart;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends \PHPUnit\Framework\TestCase
{

    public function testAddProduct()
    {
        $cart = new Cart();
        $product = new Product(1, 'My Title', 1000, 10);

        $cart->addProduct($product, 1);
        $cartItem = $cart->findCartItem(1);

        $this->assertEquals($product, $cartItem);
        $this->assertEquals(10, $cartItem->getAvailableQuantity());
    }

    public function testAddProductUpdateQuantity()
    {
        $cart = new Cart();
        $product = new Product(1, 'My Title', 1000, 10);
        $product1 = new Product(1, 'My Title', 1000, 10);

        $cart->addProduct($product, 1);
        $cart->addProduct($product1, 1);
        $cartItem = $cart->findCartItem(1);

        $this->assertEquals(2, $cartItem->getQuantity());
        $this->assertEquals($product1, $cartItem->getProduct());
    }

    public function testGetTotalQuantity()
    {

    }

    public function testGetTotalSum()
    {

    }

    public function testFindCartItem()
    {

    }

    public function testRemoveProduct()
    {

    }
}
