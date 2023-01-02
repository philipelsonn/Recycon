@extends('layout.layout')

@section('title', 'Update Item')

@section('content')
    <div class="container">
        <h3 class="text-primary fw-bold mt-3">Update Item</h3>
        <form method="POST" action="/updateItem/{{ $item->item_id }}"
            enctype="multipart/form-data">
            @csrf
            @method('UPDATE')
            <div class="row">
                <div class="d-flex jusitfy-content-between">
                    <div class="form-group col-md-4">
                        <label for="item_id" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Item ID')}}</label>
                        <div class="col-md-6">
                            <input type="text" id="item_id" name="item_id" class="form-control" disabled value="{{ $item->item_id }}">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Item Price')}}</label>
                        <div class="col-md-6">
                            <input type="text" id="price" name="price" class="form-control @error('price')
                                is-invalid
                            @enderror" required value="{{ $item->price }}">
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
                                <option value="RECYCLE" @if($item->category == "RECYCLE") selected @endif>
                                    Recycle</option>
                                <option value="SECOND" @if($item->category == "SECOND") selected @endif>
                                    Second</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="name" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Name')}}</label>
                    <div class="col-md-12">
                        <input type="text" id="name" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" required value="{{$item->name}}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="description" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Description')}}</label>
                    <div class="col-md-12">
                        <textarea rows="3" type="text" id="description" name="description" class="form-control @error('description')
                            is-invalid
                        @enderror" required>{{$item->description}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="image" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Image')}}</label>
                    <img src="/storage/images/item/{{ $item->image }}" alt="" style="height: 70px; width: 100px">
                    <div class="col-md-9">
                        <input class="form-control rounded-pill" type="text" id="image_old"
                            name="image_old" value="{{ $item->image }}" hidden>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="image" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('New Image')}}</label>
                    <div class="input-group">
                        <input type="file" name="image_new" class="form-control rounded-20 image-file-input @error('image_new')
                            is-invalid
                        @enderror" id="image_new" accept="image/png, image/jpeg, image/jpg">
                        @error('image_new')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-5 mb-4">
                    <div class="d-flex justify-content-end ms-4">
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-1 rounded-20 bg-warning fw-bold">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
