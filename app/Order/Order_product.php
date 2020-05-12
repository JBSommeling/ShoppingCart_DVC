<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    // To allow mass assignment.
    protected $fillable = ['order_id', 'product_id', 'qty', 'price'];

    /**
     * Method to define relation between order_product and products table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Product\Product');
    }
}
