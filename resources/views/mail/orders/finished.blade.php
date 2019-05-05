<div>
    <p>
        Order #{{  $order->id}} finished
    </p>
    <p>
        <h2>Order products</h2>
        <ul>
            @foreach($order->orderProducts as $product)
            <li>
                {{$product->product->name}} - {{ $product->quantity }} items
            </li>
            @endforeach
        </ul>
    </p>
    <p>
        total price: {{ $order->price }}
    </p>
</div>