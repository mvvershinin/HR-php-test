<?php


namespace App\Http\Traits;

use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderFinished;


trait Mailable
{
    public static function makeFinishedOrder(Order $order)
    {
        $order->load('orderProducts.product.vendor', 'partner');
        $vendors = $order->orderProducts->unique('product.vendor.email')->pluck('product.vendor.email');
        $partner = $order->partner->email;

        Mail::to($partner)
            ->cc($vendors)
            ->send(new OrderFinished($order));
    }
}