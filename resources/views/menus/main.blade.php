<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('index') }}" class="navbar-brand">HR php test</a>
        </div> <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
            <ul class="nav navbar-nav">
                <li class="@if($active_page == 'orders') active @endif">
                    <a href="{{ route('orders.index') }}">Orders</a>
                </li>
                <li class="@if($active_page == 'products') active @endif">
                    <a href="{{ route('products.index') }}">Products</a>
                </li>
            </ul>
        </div>
    </div>
</nav>