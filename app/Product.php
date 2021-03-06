<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Product
 *
 * @mixin \Eloquent
 */
class Product extends Model
{
    public $fillable = [
        'name',
        'price',
        'vendor_id'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
