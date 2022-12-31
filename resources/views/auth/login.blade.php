@extends('layout.layout')

@section('content')
    @if (session()->has('success'))
        <div class="d-flex justify-content-center mt-2">
            <div class="col-md-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if (session()->has('failed'))
        <div class="d-flex justify-content-center mt-2">
            <div class="col-md-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <div class="container mx-auto my-auto">
        <h3 class="text-primary text-center">Please Sign In</h3>
        <div class="row justify-content-center align-items-center">
            <form method="POST" action="/login">
                @csrf
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4">
                        <input type="email" id="email" name="email" class="form-control p-2 @error('email')
                            is-invalid
                        @enderror" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4">
                        <input type="password" id="password" name="password" class="form-control p-2" placeholder="Password" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <input type="checkbox" id="item_id" name="item_id" class="form-check-input">
                    <label for="" class="ms-3">Remember me</label>
                </div>
                <div class="form-group row mt-3">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-1 rounded-20 bg-warning fw-bold">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
