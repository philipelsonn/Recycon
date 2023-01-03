@extends('layout.layout')

@section('content')
    @if (session()->has('success'))
        <div class="col-md-4 mx-auto">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session()->has('failed'))
        <div class="col-md-4 mx-auto">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container mx-auto my-auto">
        <h3 class="text-primary text-center">Please Sign In</h3>
        <div class="row justify-content-center align-items-center">
            <form method="POST" action="/login">
                @csrf
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4 form-floating">
                        <input type="email" id="email" name="email" class="form-control @error('email')
                            is-invalid
                        @enderror" placeholder="Email" @if (Cookie::has('email'))
                            value="{{ Cookie::get('email') }}"
                        @else
                            value="{{ old('email') }}"
                        @endif required>
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4 form-floating">
                        <input type="password" id="password" name="password" class="form-control" @if (Cookie::has('password'))
                            value="{{ Cookie::get('password') }}"
                        @endif placeholder="Password" required>
                        <label for="email">Password</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <input type="checkbox" @if (Cookie::has('email'))
                        checked
                    @endif id="remember" name="remember" class="form-check-input">
                    <label for="remember" class="ms-3">Remember me</label>
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
