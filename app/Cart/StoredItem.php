<?php


namespace App\Cart;


class StoredItem
{
    public $qty;
    public $price;
    public $product;

    public function __construct($price, $product)
    {
        $this->qty = 0;
        $this->price = $price;
        $this->product = $product;
    }
}
