@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div  class="col-lg-12">
                @include('menus.orders_tabs')
                <div class="table-responsive ajax-table">
                </div>
                <div class="ajax-paginator">
                </div>
            </div>
        </div>
    </div>
@endsection