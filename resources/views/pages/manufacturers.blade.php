@extends('layouts.base')

@section('title-prefix', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <manufacturer-create-component />
                </div>
                <div class="card-body">
                    <manufacturers-table-component />
                </div>
            </div>
        </div>
    </div>
@endsection
