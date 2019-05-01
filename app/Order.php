<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Order
 *
 * @method static Order indexList()
 *
 * @mixin \Eloquent
 */
class Order extends Model
{
    public $fillable = [
        'status',
        'client_email',
        'partner_id',
        'delivery_dt',
    ];

    public function getStringStatusAttribute()
    {
        return STATUS[$this->status];
    }

    public function scopeIndexList(Builder $query)
    {
        return $query->with('orderProducts.product', 'partner');
    }

    public function getProductNamesAttribute()
    {
        return $this->orderProducts->implode('product.name', ', ');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
