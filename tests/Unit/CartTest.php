<?php


namespace Tests\Unit;

use App\Cart\iCart;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Cart\Cart;
use Tests\Cart\testProduct;


class CartTest extends TestCase
{
    private $product;
    private $product_id;
    private $sessionName = 'testCart';

    /**
     * Method to test Add method of Cart Class.
     */
    public function testAdd_IfProductIsAddedToShoppingCart_SessionContainsProduct()
    {
        //Arrange
        $cart = $this->testCartSetup();
        $amount = 5;
        $response = $this->get('/');

        //Act
        $cart->add($this->product, $this->product_id, $amount, $this->sessionName);

        //Assert
        $response->assertSessionHas($this->sessionName);
        $this->assertEquals(50, Session::get($this->sessionName)->totalPrice);
        $this->assertEquals('Harry Potter', Session::get($this->sessionName)->items[1]->product->title);
        $this->assertEquals(1, Session::get($this->sessionName)->items[1]->product->id);
    }

    /**
     * Method to test editAmount method of Cart Class if newAmount is higher than zero
     */
    public function testEditAmount_IfNewAmountIsHigherThanZero_SessionHasMoreProduct()
    {
        //Arrange
        $cart = $this->testCartSetup();
        $amount = 5;
        $newAmount = 7;
        $cart->add($this->product, $this->product_id, $amount, $this->sessionName);

        //Act
        $cart->editAmount($this->product, $this->product_id, $newAmount, $this->sessionName);

        //Assert
        $this->assertEquals(70, Session::get($this->sessionName)->totalPrice);
        $this->assertEquals(7, Session::get($this->sessionName)->items[1]->qty);
        $this->assertTrue($amount < Session::get($this->sessionName)->items[1]->qty);
    }

    /**
     *  Method to test editAmount method of Cart Class if newAmount is equal to zero
     */

    public function testEditAmount_IfNewAmountIsEqualToZero_SessionItemsIsEmpty()
    {
        //Arrange
        $cart = $this->testCartSetup();
        $amount = 5;
        $newAmount = 0;
        $cart->add($this->product, $this->product_id, $amount, $this->sessionName);

        //Act
        $cart->editAmount($this->product, $this->product_id, $newAmount, $this->sessionName);

        //Assert
        $this->assertEquals(0, Session::get($this->sessionName)->totalPrice);
        $this->assertEquals(0, Session::get($this->sessionName)->totalQty);
        $this->assertTrue(empty(Session::get($this->sessionName)->items));
    }

    /**
     * Method to test removeCartContent method of Cart Class when user makes payment.
     */
    public function testRemoveCartContent_WhenUserMakesPayment_SessionIsDestroyed(){
        //Arrange
        $cart = $this->testCartSetup();
        $amount = 5;
        $response = $this->get('/');
        $cart->add($this->product, $this->product_id, $amount, $this->sessionName);

        //Act
        $cart->removeCartContent($this->sessionName);

        //Assert
        $response->assertSessionMissing($this->sessionName);
    }

    /**
     * Setup to mock product, id and session.
     */
    public function testCartSetup(){
        $this->product = new testProduct();

        $this->product_id = $this->product->id;
        return new Cart($this->sessionName);
    }
}
