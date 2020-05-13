<?php


namespace App\Cart;


interface iCart
{
    public function add($product, $product_id, $amount);
    public function editAmount($product, $product_id, $newAmount);
    public function removeProduct($product_id);
    public function removeCartContent();
    public function addToSession();
}
