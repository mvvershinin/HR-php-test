<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Order
 *
 * @method static Order newOrders()
 * @method static Order overdueOrders()
 * @method static Order finishedOrders()
 * @method static Order currentOrders()
 * @method static Order related()
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

    public function scopeCurrentOrders(Builder $query)
    {
        return $query
            ->whereBetween('delivery_dt', [now(), now()->addDay()])
            ->where('status', CONFIRMED_ORDER)
            ->orderBy('delivery_dt', 'asc');
    }

    public function scopeFinishedOrders(Builder $query)
    {
        return $query
            ->whereBetween('delivery_dt', [now(), now()->addDay()])
            ->where('status', FINISHED_ORDER)
            ->orderBy('delivery_dt', 'desc');
    }

    public function scopeNewOrders(Builder $query)
    {
        return $query
            ->where('delivery_dt', '>', now())
            ->where('status', NEW_ORDER)
            ->orderBy('delivery_dt', 'asc');
    }

    public function scopeOverdueOrders(Builder $query)
    {
        return $query
            ->where('delivery_dt', '<', now())
            ->where('status', CONFIRMED_ORDER)
            ->orderBy('delivery_dt', 'desc');
    }

    public function scopeRelated(Builder $query)
    {
        return $query
            ->with('orderProducts.product', 'partner');
    }

    public function getPriceAttribute()
    {
        return $this->orderProducts->map(function ($item) {
                return $item['price'] * $item['quantity'];
            })->sum() ?? null;
    }

    public function getProductNamesAttribute()
    {
        return $this->orderProducts->implode('product.name', ', ') ?? null;
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
