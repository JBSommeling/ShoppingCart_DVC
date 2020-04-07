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
     * @param $product_id - id of product to be sent into cart.
     */
    public function add($product, $product_id, $amount) {
        $storedItem = ['qty' => 0, 'price' => $product->price, 'product' => $product];
        //To check if items are present in Cart and something else than null.
        if ($this->items) {
            /*to check by id, if item is already present in Cart (items array), then $storedItem must be overwritten by
            item/product object array. Qty, price and item are still the same as it was before.*/
            if (array_key_exists($product_id, $this->items)) {
                $storedItem = $this->items[$product_id];
            }
        }

        $storedItem['qty'] += $amount;
        $storedItem['price'] = $product->price * $storedItem['qty'];

        //To overwrite old values in items array
        $this->items[$product_id] = $storedItem;
        $this->totalQty += $amount;
        $this->totalPrice += $storedItem['price'];
    }

    /**
     * Function to change amount of items per product.
     * @param $product - the product of the amount that needs to be edited.
     * @param $product_id - the id of the product of the amount that needs to be edited.
     * @param $newAmount - the new amount of the product that needs to be edited.
     */
    public function editAmount($product, $product_id, $newAmount){
        $storedItem = $this->items[$product_id];

        // To remove old quantity from totalQty property
        $this->totalQty -= $storedItem['qty'];

        // To remove old price from totalPrice property.
        $this->totalPrice -= $storedItem['price'];

        if ($newAmount > 0) {
            // To assign new values to storedItem.
            $storedItem['qty'] = $newAmount;
            $storedItem['price'] = $product->price * $storedItem['qty'];

            //To overwrite old values in items array
            $this->items[$product_id] = $storedItem;

            $this->totalQty += $storedItem['qty'];
            $this->totalPrice += $storedItem['price'];
        }
        else {
            unset($this->items[$product_id]);
        }
    }
}
