@extends('layout.layout')

@section('title', 'Show Item Detail')

@section('content')
    <div class="card m-5 d-flex align-items-stretch">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/storage/images/item/{{ $product->image }}" class="img-fluid rounded-start" alt="...">
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
                        <label for="quantity">Qty:</label>
                        <input type="number" id="quantity" name="quantity" min="1">
                        <button class="btn btn-warning btn-outline-light" type="submit">Add To Cart</button>
                        </form>
                        @endif
                    @else
                    <a class="btn btn-warning btn-outline-light" type="submit" href="{{ route('login') }}">login to buy</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
