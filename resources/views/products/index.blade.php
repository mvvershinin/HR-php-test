@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>product id</th>
                        <th>name</th>
                        <th>vendor name</th>
                        <th>price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $product)
                        <tr>
                            <td> {{ $product->id }} </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->vendor->name ?? null}} </td>
                            <td> {{ $product->price }} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        {{ $items->render() }}
    </div>
@endsection