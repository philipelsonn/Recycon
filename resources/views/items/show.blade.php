@extends('layout.layout')

@section('title', 'View Items')

@section('content')
    <p class="fs-2 text-dark mb-1 d-flex justify-content-center fw-bold">Our Products</p>
    <div class="row d-flex justify-content-center">
    @foreach ($products as $product)
        <div class="card col-md-4 ms-4 me-4 border border-warning" style="width: 25rem;">
            <img src="/storage/images/item/{{ $product->image }}" class="card-img-top p-1 mt-2" style="height: 400px" alt="...">
            <div class="card-body ">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h5>{{ $product->category }}</h5>
                </div>
                <p class="card-text">IDR. {{ $product->price }}</p>
                <a href="/showProduct/{{ $product->item_id }}" class="btn btn-primary bg-warning text-dark border border-warning fw-bold">Detail Product</a>
            </div>
        </div>
    @endforeach
    </div>
    <div class="mx-auto mt-3">
        {{ $products->links() }}
    </div>
@endsection
