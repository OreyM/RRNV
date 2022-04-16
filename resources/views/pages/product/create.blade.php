@extends('layouts.base')

@section('title-prefix', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <product-create-component />
        </div>
    </div>
@endsection
