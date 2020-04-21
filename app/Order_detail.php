<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    // To allow mass assignment.
    protected $fillable = ['order_id', 'street', 'postalcode', 'city', 'country', 'totalPrice', 'payment'];

}
