@extends('layout.layout')

@section('content')
    <div class="container mx-auto my-auto">
        <h3 class="text-primary text-center">Register Form</h3>
        <div class="row justify-content-center align-items-center">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4">
                        <input type="text" id="item_id" name="item_id" class="form-control p-2" placeholder="Full Name" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4">
                        <input type="text" id="item_id" name="item_id" class="form-control p-2" placeholder="Email" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4">
                        <input type="text" id="item_id" name="item_id" class="form-control p-2" placeholder="Password" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-4">
                        <input type="text" id="item_id" name="item_id" class="form-control p-2" placeholder="Confirm PasswordPassword" required>
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
