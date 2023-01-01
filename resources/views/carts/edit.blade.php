@extends('layout.layout')

@section('title', 'Edit Cart')

@section('content')
    <div class="card m-5 d-flex align-items-stretch">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/storage/images/item/{{ $transaction->item->image }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8 d-flex justify-content-center">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $transaction->item->name }}</h5>
                    <hr>
                    <p class="card-text fw-bold">Category:</p>
                    <p class="card-text">{{ $transaction->item->category }}</p>
                    <hr>
                    <p class="card-text fw-bold">Price:</p>
                    <p class="card-text">IDR. {{ $transaction->item->price }}</p>
                    <hr>
                    <p class="card-text fw-bold">Description:</p>
                    <p class="card-text">{{ $transaction->item->description }}</p>
                    <hr>
                    <form method="POST" action="{{ route('updateCart', $transaction->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('UPDATE')
                    <label for="quantity">Qty:</label>
                    <input type="number" id="quantity" name="quantity" min="1">
                    @method('PUT')
                    <button class="btn btn-warning btn-outline-light" type="submit">Update Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
