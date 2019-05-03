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
            <td> <a href="{{ route('orders.edit', [$order]) }}" target="_blank">
                    {{ $order->id }}
                </a>
            </td>
            <td> {{ $order->partner->name ?? null}} </td>
            <td> {{ $order->price }}</td>
            <td> {{ $order->product_names }} </td>
            <td> {{ $order->string_status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>