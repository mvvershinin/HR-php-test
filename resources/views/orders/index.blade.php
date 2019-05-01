@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>order id</th>
                        <th>Partner name</th>
                        <th>Order Price</th>
                        <th>Order Products</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $order)
                        <tr>
                            <td> {{ $order->id }}</td>
                            <td> {{ $order->partner->name ?? null}} </td>
                            <td> price </td>
                            <td> {{ $order->product_names }} </td>
                            <td> {{ $order->string_status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        {{ $items->render() }}
    </div>
@endsection
