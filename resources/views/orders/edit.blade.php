@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div  class="col-lg-6">
                <form action="{{ route('orders.update', [$item]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                        <label for="email">Clent email:</label>
                        <input type="email" class="form-control" name="client_email" value="{{ $item->client_email }}">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Partner:</label>
                        <select class="form-control" name="partner_id">
                            @foreach($partners as $id => $name)
                                <option @if($item->partner_id == $id)selected @endif value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Order status:</label>
                        <select class="form-control" name="status">
                            @foreach($statuses as $id => $name)
                                <option @if($item->status == $id)selected @endif value="{{ $id }}">{{ $name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                </form>


            </div>
            <div  class="col-lg-6">
                <h4>Total order price: <span class="label label-default">{{ $item->price }}</span></h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item->orderProducts as $product)
                        <tr>
                            <td> {{ $product->product->name }} </td>
                            <td> {{ $product->quantity }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection