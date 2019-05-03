<?php

namespace App\Http\Controllers\Ajax;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

define('ORDERS_TABLE_BODY', 'layouts.orders_table');

class OrderController extends Controller
{
    /**
     * Display a listing of all orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $data = Order::related()->latest('updated_at')
            ->paginate(PAGE_SIZE_REGULAR);

        $html = view(ORDERS_TABLE_BODY,
                ['items' => $data]
            )->render();

        $paginate = $data->render();

        return response()->json([ 'html' => $html, 'paginate' => (string)$paginate ], 200);
    }

    /**
     * Display a listing of current orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCurrent()
    {
        $data = Order::related()->currentOrders()->paginate(PAGE_SIZE_BIG);

        $html = view(ORDERS_TABLE_BODY,
                ['items' => $data]
            )->render();

        $paginate = $data->render();

        return response()->json([ 'html' => $html, 'paginate' => (string)$paginate ], 200);
    }
    /**
     * Display a listing of new orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNew()
    {
        $data = Order::related()->newOrders()->paginate(PAGE_SIZE_BIG);

        $html = view(ORDERS_TABLE_BODY,
                ['items' => $data]
            )->render();

        $paginate = $data->render();

        return response()->json([ 'html' => $html, 'paginate' => (string)$paginate ], 200);
    }

    /**
     * Display a listing of overdue orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOverdue()
    {
        $data = Order::related()->overdueOrders()->paginate(PAGE_SIZE_BIG);

        $html = view(ORDERS_TABLE_BODY,
                ['items' => $data]
            )->render();

        $paginate = $data->render();

        return response()->json([ 'html' => $html, 'paginate' => (string)$paginate ], 200);
    }

    /**
     * Display a listing of finished orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFinished()
    {
        $data = Order::related()->finishedOrders()->paginate(PAGE_SIZE_BIG);

        $html = view(ORDERS_TABLE_BODY,
                ['items' => $data]
            )->render();

        $paginate = $data->render();

        return response()->json([ 'html' => $html, 'paginate' => (string)$paginate ], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }
}
