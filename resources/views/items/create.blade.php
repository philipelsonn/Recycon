@extends('layout.layout')

@section('title', 'Add Item')

@section('content')
<div class="container mt-5 py-5">
    <div class=" card card-shadow border-0 rounded-20 ">
        <div class="card-body my-3">
            <div class="title-line"></div>
            <h5 class="subheading-text mt-3">Items</h5>
            <h3 class="fw-bold my-3 c-text-1">Add New Item</h3>
            <hr>
            <form method="POST" action="{{route('items.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group row mb-0 mb-sm-3">
                            <label for="item_id" class="col-sm-3 col-form-label text-sm-left">
                                {{_('Item ID')}}</label>
                            <div class="col-sm-9">
                                <input type="text" id="item_id" name="item_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mb-sm-3">
                            <label for="price" class="col-sm-3 col-form-label text-sm-left">
                                {{_('Item Price')}}</label>
                            <div class="col-sm-9">
                                <input type="text" id="price" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mb-sm-3 ">
                            <label for="category" class="col-sm-3 col-form-label text-sm-left">
                                {{_('Category')}}</label>
                            <div class="col-sm-9">
                                <select name="category" class="form-select" required>
                                    <option value="" disabled selected>Choose...
                                    </option>
                                    <option value="RECYCLE">
                                        Recycle</option>
                                    <option value="SECOND">
                                        Second</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mb-sm-3">
                            <label for="name" class="col-sm-3 col-form-label text-sm-left">
                                {{_('Item Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mb-sm-3">
                            <label for="description" class="col-sm-3 col-form-label text-sm-left">
                                {{_('Item Description')}}</label>
                            <div class="col-sm-9">
                                <textarea rows="3" type="text" id="description" name="description" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mb-sm-3">
                            <label for="image" class="col-sm-3 col-form-label text-sm-left">
                                {{_('Image')}}</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-1 rounded-20">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
