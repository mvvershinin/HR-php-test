@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
                @include('layouts.orders_table')
            </div>
            </div>
        </div>
        {{ $items->render() }}
    </div>
@endsection
