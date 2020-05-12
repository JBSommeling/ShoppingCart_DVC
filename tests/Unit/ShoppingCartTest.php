<?php


namespace Tests\Unit;

use PHPUnit\Framewcork\TestCase;
use App\Cart;

class ShoppingCartTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdd()
    {
        // add something to the cart
        $cart = new Cart();
        $cart->add();
        // check that key is n in items array
        $this->assertTrue(array_key_exists($cart->items, ));
    }

}
