@extends('layout.layout')

@section('title', 'Edit Cart')

@section('content')
    <div class="card d-flex align-items-stretch mx-auto my-auto w-75 bg-light">
        <div class="row g-0">
            <div class="col-md-4 my-auto">
                <img src="/storage/images/item/{{ $transaction->item->image }}" class="card-img-top embed-responsive-item" alt="...">
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
                    <label for="quantity" class="fw-bold">Qty:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" style="width:4rem">
                    @method('PUT')
                    <button class="btn btn-warning fw-bold ms-4" type="submit">Update Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
