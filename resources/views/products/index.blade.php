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
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $product)
                        <tr data-id="{{ $product->id }}">
                            <td> {{ $product->id }} </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->vendor->name ?? null}} </td>
                            <td data-price-id="{{ $product->id }}" class="js-price-column">
                                {{ $product->price }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary js-popover"
                                        data-form="{{ route('ajax.products.edit.price', [ 'id' => $product->id ]) }}">
                                    Change price
                                </button>
                            </td>
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