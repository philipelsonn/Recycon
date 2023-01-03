@extends('layout.layout')

@section('content')
    @if (session()->has('updated'))
        <div class="col-md-4 mx-auto">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updated') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('changed'))
        <div class="col-md-4 mx-auto">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('changed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container-fluid bg-light">
        <div class="container-fluid d-flex justify-content-center mb-5">
            <img src="https://img1.goodfon.com/wallpaper/nbig/c/1a/recycle-cans-recycled-old.jpg" alt="" style="height:600px; width:100%">
            <p class="carousel-caption text-warning fw-bold fs-1" style="top: 35%">RECYCON SHOP</p>
        </div>
        <div class="container-fluid d-flex flex-column mb-5">
            <p class="text-success fs-1 d-flex justify-content-center">ABOUT US</p>
            <div class="container-fluid d-flex justify-content-center border-dotted w-75">
                <p class="text-dark fs-2 p-10 mt-4 mb-4">We are a shop for buying recycle things and second hand thing</p>
            </div>
        </div>
    </div>
@endsection
