@extends('layout.layout')

@section('content')
    <div class="container mx-auto my-auto">
        <h3 class="text-primary text-center">Register Form</h3>
        <div class="row justify-content-center align-items-center">
            <form method="POST" action="/register">
                @csrf
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4 form-floating">
                        <input type="text" id="username" name="username" class="form-control @error('name')
                            is-invalid
                        @enderror" placeholder="Full Name" value="{{ old('username') }}" required>
                        <label for="username">Full Name</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4 form-floating">
                        <input type="email" id="email" name="email" class="form-control @error('email')
                            is-invalid
                        @enderror" placeholder="Email" value="{{ old('email') }}" required>
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
                        <input type="password" id="password" name="password" class="form-control @error('password')
                            is-invalid
                        @enderror" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4 form-floating">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control @error('password')
                        is-invalid
                        @enderror" placeholder="Confirm Password" required>
                        <label for="confirmPassword">Confirm Password</label>
                        @error('confirmPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-1 rounded-20 bg-warning fw-bold">Register Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
