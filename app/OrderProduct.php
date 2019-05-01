<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model OrderProduct
 *
 * @mixin \Eloquent
 */
class OrderProduct extends Model
{
    public $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
