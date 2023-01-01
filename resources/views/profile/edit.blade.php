@extends('layout.layout')

@section('content')
    @auth
        <div class="container mx-auto my-auto">
            <h2 class="text-center text-primary fw-bold">Edit Profile</h2>
            <form action="/editProfile" method="POST">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="col-md-8 form-floating mt-2">
                        <input type="text" class="form-control @error('username')
                            is-invalid
                        @enderror" placeholder="New Username" id="username" name="username" value="{{ auth()->user()->username }}" required>
                        <label for="username">New Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-md-8 form-floating mt-3">
                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror" placeholder="New Username" id="email" name="email" value="{{ auth()->user()->email }}" required>
                        <label for="email">New Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-1 rounded-20 bg-warning fw-bold">Save</button>
                    </div>
                </div>
            </form>
        </div>
    @endauth
@endsection
