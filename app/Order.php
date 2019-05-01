<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Order
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
/*
    public function getProductNamesAttribute()
    {
        $names = $this->orderProducts->product->pluck('name');
        dd($names);
        return self::implode(', ', $names);
    }
*/
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
