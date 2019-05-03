<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateOrder;
use App\Order;
use App\Partner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index', [
            'active_page' => 'orders'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', [
            'item' => $order->load('orderProducts.product', 'partner'),
            'partners' => Partner::get()->pluck('name', 'id'),
            'statuses' => STATUS,
            'active_page' => 'orders'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(updateOrder $request, $id)
    {
        $request->validated();

        $order = Order::find($id);
        $order->update([
            'client_email' => $request->get('client_email'),
            'partner_id' => $request->get('partner_id'),
            'status' => $request->get('status')
        ]);

        return redirect()->route('orders.edit', [$order]);

    }
}
