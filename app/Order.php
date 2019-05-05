<?php

namespace App;

use App\Http\Traits\Mailable;
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
    use Mailable;

    public $fillable = [
        'status',
        'client_email',
        'partner_id',
        'delivery_dt',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function (Order $model) {
            $changes = $model->getDirty();
            if (!empty($changes['status']) && $changes['status'] == FINISHED_ORDER) {
                self::makeFinishedOrder($model);
            }
        });
    }

    /**
     * get string value for status
     *
     * @return mixed
     */
    public function getStringStatusAttribute()
    {
        return STATUS[$this->status];
    }

    /**
     * params for query current orders
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeCurrentOrders(Builder $query)
    {
        return $query
            ->whereBetween('delivery_dt', [now(), now()->addDay()])
            ->where('status', CONFIRMED_ORDER)
            ->orderBy('delivery_dt', 'asc');
    }

    /**
     * params for query finished orders
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeFinishedOrders(Builder $query)
    {
        return $query
            ->whereBetween('delivery_dt', [now(), now()->addDay()])
            ->where('status', FINISHED_ORDER)
            ->orderBy('delivery_dt', 'desc');
    }

    /**
     * params for query new orders
     *
     * @param Builder $query
     * @return Builder
     */
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

    /**
     * calculate total price for order
     *
     * from products items quantity and price
     *
     * @return |null
     */
    public function getPriceAttribute()
    {
        return $this->orderProducts->map(function ($item) {
                return $item['price'] * $item['quantity'];
            })->sum() ?? null;
    }

    /**
     *  return names list
     *
     *  from products names
     *
     * @return string|null
     */
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
