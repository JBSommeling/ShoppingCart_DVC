<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    // To allow mass assignment.
    protected $fillable = ['order_id', 'product_id', 'qty', 'price'];

}
