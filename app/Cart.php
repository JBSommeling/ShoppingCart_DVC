<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        //To check if oldCart is present and different than null
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Function to add products in cart and keep track on qty, price and total products in cart
     * @param $product - product to be sent into cart.
     * @param $id - id of product to be sent into cart.
     */
    public function add($product, $id) {
        $storedItem = ['qty' => 0, 'price' => $product->price, 'product' => $product];
        //To check if items are present in Cart and something else than null.
        if ($this->items) {
            /*to check by id, if item is already present in Cart (items array), then $storedItem must be overwritten by
            item/product object array. Qty, price and item are still the same as it was before.*/
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $product->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $product['price'];
    }
}
