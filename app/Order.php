<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // To allow mass assignment.
    protected $fillable = ['order_id'];

    /**
     * Method to define relationship between order and users table.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne('App\User');
    }

    /**
     * Method to define relationship between order and order_detail table.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order_detail(){
        return $this->hasOne('App\Order_detail');
    }

    /**
     * Method to define relationship between order and order_product table.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order_product(){
        return $this->hasOne('App\Order_product');
    }
}
