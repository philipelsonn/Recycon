@extends('layout.layout')

@section('content')
    @if (session()->has('error'))
        <div class="d-flex justify-content-center mt-2">
            <div class="col-md-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <div class="container mx-auto my-auto">
        <h2 class="text-center text-primary fw-bold">Change Password</h2>
        <form action="/changePassword" method="POST">
            @csrf
            <div class="d-flex justify-content-center">
                <div class="col-md-8 form-floating mt-2">
                    <input type="password" class="form-control @error('password')
                        is-invalid
                    @enderror" placeholder="Old Password" id="password" name="password" required>
                    <label for="password">Old Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-8 form-floating mt-3">
                    <input type="password" class="form-control @error('newPassword')
                        is-invalid
                    @enderror" placeholder="New Password" id="newPassword" name="newPassword" required>
                    <label for="newPassword">New Password</label>
                    @error('newPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-8 form-floating mt-3">
                    <input type="password" class="form-control @error('confirmNewPassword')
                        is-invalid
                    @enderror" placeholder="Confirm New Password" id="confirmNewPassword" name="confirmNewPassword" required>
                    <label for="confirmNewPassword">Confirm New Password</label>
                    @error('confirmNewPassword')
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
@endsection
