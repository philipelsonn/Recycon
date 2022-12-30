@extends('layout.layout')

@section('title', 'Update Item')

@section('content')
    <div class="container">
        <h3 class="text-primary fw-bold mt-5">Update Item</h3>
        <form method="POST" action="{{ route('items.update', $item->id)}}"
            enctype="multipart/form-data">
            @csrf
            @method('UPDATE')
            <div class="row">
                <div class="d-flex jusitfy-content-between">
                    <div class="form-group col-md-4">
                        <label for="item_id" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Item ID')}}</label>
                        <div class="col-md-6">
                            <input type="text" id="item_id" name="item_id" class="form-control" disabled value="{{$item->item_id}}">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Item Price')}}</label>
                        <div class="col-md-6">
                            <input type="text" id="price" name="price" class="form-control" required value="{{$item->price}}">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="category" class="col-md-6 col-form-label text-sm-left fw-bold">
                            {{_('Category')}}</label>
                        <div class="col-md-6">
                            <select name="category" class="form-select" required>
                                <option value="RECYCLE" @if($item->category == "RECYCLE") selected @endif>
                                    Recycle</option>
                                <option value="SECOND" @if($item->category == "SECOND") selected @endif>
                                    Second</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="name" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Name')}}</label>
                    <div class="col-md-12">
                        <input type="text" id="name" name="name" class="form-control" required value="{{$item->name}}">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="description" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Description')}}</label>
                    <div class="col-md-12">
                        <textarea rows="3" type="text" id="description" name="description" class="form-control" required>{{$item->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label for="image" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Item Image')}}</label>
                    <div class="col-md-9">
                        <input class="form-control rounded-pill" type="text" id="image_old"
                            name="image_old" value="{{ $item->image }}" hidden>
                        <div class="input-group ms-4">
                            <input type="file" name="image_new" class="form-control rounded-20 image-file-input" id="image_new" accept="image/png, image/jpeg, image/jpg">
                            <a href="/storage/images/item/{{ $item->image }}" target="_blank" class="btn btn-info reset-file-input text-white bg-primary">Current Image</a>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="d-flex justify-content-end ms-4">
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-1 rounded-20 bg-warning fw-bold">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
