@extends('layout.layout')

@section('title', 'Add Item')

@section('content')
    <div class="container">
        <h3 class="text-primary fw-bold mt-5">Add New Item</h3>
        <form method="POST" action="/addItem" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex jusitfy-content-between">
                    <div class="form-group col-md-4">
                        <label for="item_id" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Item ID')}}</label>
                        <div class="col-md-6">
                            <input type="text" id="item_id" name="item_id" class="form-control @error('item_id')
                                is-invalid
                            @enderror" placeholder="Enter Item ID" value="{{ old('item_id') }}" required>
                            @error('item_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Item Price')}}</label>
                        <div class="col-md-6">
                            <input type="text" id="price" name="price" class="form-control @error('price')
                                is-invalid
                            @enderror" placeholder="Enter Item Price" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="category" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Category')}}</label>
                        <div class="col-md-6">
                            <select name="category" class="form-select @error('category')
                                is-invalid
                            @enderror" required>
                                <option value="" disabled selected>Choose One
                                </option>
                                <option value="RECYCLE" @if (old('category') == "RECYCLE")
                                    selected
                                @endif>
                                    Recycle</option>
                                <option value="SECOND" @if (old('category') == "SECOND")
                                    selected
                                @endif>
                                    Second</option>
                            </select>
                        </div>
                        @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="name" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Name')}}</label>
                    <div class="col-md-12">
                        <input type="text" id="name" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" placeholder="Enter Item Name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="description" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Description')}}</label>
                    <div class="col-md-12">
                        <textarea rows="3" type="text" id="description" name="description" class="form-control @error('description')
                            is-invalid
                        @enderror" placeholder="Enter Item Description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="image" class="col-sm-3 col-form-label text-sm-left fw-bold">
                        {{_('Image File Upload')}}</label>
                    <div class="col-md-12">
                        <input class="form-control @error('image')
                            is-invalid
                        @enderror" type="file" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="d-flex justify-content-end ms-4">
                        <button type="submit" class="btn btn-outline-1 rounded-20 bg-warning fw-bold">Add Item</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
