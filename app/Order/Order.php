<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // To allow mass assignment.
    protected $fillable = ['order_id', 'user_id'];

    /**
     * Method to define relationship between order and users table.
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Method to define relationship between order and order_detail table.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order_detail(){
        return $this->hasOne('App\Order\Order_detail');
    }

    /**
     * Method to define relationship between order and order_product table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_product(){
        return $this->hasMany('App\Order\Order_product');
    }
}
