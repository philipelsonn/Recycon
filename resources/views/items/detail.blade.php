@extends('layout')

@section('title', 'Show Item Detail')

@section('content')
    <div class="card m-5 d-flex align-items-stretch">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/storage/images/item/{{ $product->image }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Category</p>
                    <p class="card-text">{{ $product->category }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
