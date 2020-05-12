<?php


namespace App\Cart;


interface iCart
{
    public function add($product, $product_id, $amount);
    public function editAmount($product, $product_id, $newAmount);
    public function remove($product_id);
    public function addToSession();
}
