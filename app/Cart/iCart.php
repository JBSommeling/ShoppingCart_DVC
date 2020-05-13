<?php


namespace App\Cart;


interface iCart
{
    public function add($product, $product_id, $amount, $session = 'cart');
    public function editAmount($product, $product_id, $newAmount, $session = 'cart');
    public function removeProduct($product_id);
    public function removeCartContent();
    public function addToSession($session);
}
