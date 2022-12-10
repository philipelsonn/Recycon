@extends('layout')

@section('title', 'View Item')

@section('content')
<div class="container mt-5 py-5">
    <div class=" card card-shadow border-0 rounded-20 ">
        <div class="card-body my-3">
            <div class="title-line"></div> 
            <h5 class="subheading-text mt-3">Items</h5>
            <h3 class="fw-bold my-3 c-text-1">Item List</h3>
            <hr>
            @if (count($items) == 0)
                <div class="text-center">
                    No Data
                </div>
            @else
                <div class="table-responsive py-3">
                    <table class="table table-bordered table-sm table-striped no-footer">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th class="align-middle">No</th>
                                <th class="align-middle">Item ID</th>
                                <th class="align-middle">Item Image</th>
                                <th class="align-middle">Item Name</th>
                                <th class="align-middle">Item Description</th>
                                <th class="align-middle">Item Price</th>
                                <th class="align-middle">Item Category</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                @php ($i = 1)
                                <tr class="text-center">
                                    <td class="align-middle">{{ $i }}</td>
                                    <td class="align-middle">{{ $item->item_id }}</td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle">{{ $item->name }}</td>
                                    <td class="align-middle">{{ $item->description }}</td>
                                    <td class="align-middle">{{ $item->price }}</td>
                                    <td class="align-middle">{{ $item->category }}</td>
                                    <td class="align-middle">
                                        <div class="btn-toolbar flex-nowrap justify-content-center">
                                            <div class="btn-group me-2">
                                                <a class="btn btn-sm btn-block btn-warning text-white" href="{{ route('items.edit', $item->id) }}">UPDATE   </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php ($i = $i + 1)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>  
</div> 
@endsection