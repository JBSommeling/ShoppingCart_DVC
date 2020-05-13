<?php


namespace Tests\Unit;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Cart\Cart;
use Tests\Cart\testProduct;


class CartTest extends TestCase
{
    private $product;
    private $product_id;
    private $sessionName;

    /**
     * Method to test Add method of Cart Class.
     */
    public function testAdd()
    {
        //Arrange
        $this->testCartSetup();
        $cart = new Cart();
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



    public function testCartSetup(){
        $this->product = new testProduct();

        $this->product_id = $this->product->id;
        $this->sessionName = 'testCart';
        $this->withSession([$this->sessionName => null]);
    }
}
