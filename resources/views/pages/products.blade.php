@extends('layouts.base')

@section('title-prefix', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success btn-sm" href="{{ Routing::url('product.create') }}">
                        New Product
                    </a>
                </div>
                <div class="card-body">
                    <products-table-component />
                </div>
            </div>
        </div>
    </div>
@endsection
