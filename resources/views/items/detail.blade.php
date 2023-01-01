@extends('layout.layout')

@section('title', 'Show Item Detail')

@section('content')
    <div class="card d-flex align-items-stretch mx-auto my-auto w-75 bg-light">
        <div class="row g-0">
            <div class="col-md-4 my-auto">
                <img src="/storage/images/item/{{ $product->image }}" class="card-img-top embed-responsive-item" alt="...">
            </div>
            <div class="col-md-8 d-flex justify-content-center">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                    <hr>
                    <p class="card-text fw-bold">Category:</p>
                    <p class="card-text">{{ $product->category }}</p>
                    <hr>
                    <p class="card-text fw-bold">Price:</p>
                    <p class="card-text">IDR. {{ $product->price }}</p>
                    <hr>
                    <p class="card-text fw-bold">Description:</p>
                    <p class="card-text">{{ $product->description }}</p>
                    <hr>
                    @if (auth()->user())
                        @if (auth()->user()->type == 'USER')
                        <form method="POST" action="{{ route('addToCart', $product->item_id) }}" enctype="multipart/form-data">
                        @csrf
                        <label for="quantity" class="fw-bold">Qty:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" style="width: 4rem">
                        <button class="btn btn-warning text-dark fw-bold ms-4" type="submit">Add To Cart</button>
                        </form>
                        @endif
                    @else
                    <a class="btn btn-warning btn-outline-light text-dark fw-bold ms-4" type="submit" href="{{ route('login') }}">Login to buy</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
