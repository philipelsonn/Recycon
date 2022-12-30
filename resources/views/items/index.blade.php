@extends('layout.layout')

@section('title', 'Manage Items')

@section('content')
    <div class="container-fluid">
        <h3 class="text-dark fw-bold ms-3 mt-3">Manage Item</h3>
        @if (count($items) == 0)
                <div class="text-center">
                    No Data
                </div>
            @else
                <div class="table-responsive px-3">
                    <table class="table table-bordered table-sm table-striped no-footer table-warning border-primary">
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
                            @php ($i = 1)
                            @foreach ($items as $item)
                                <tr class="text-center">
                                    <td class="align-middle">{{ $i }}</td>
                                    <td class="align-middle">{{ $item->item_id }}</td>
                                    <td class="align-middle"></td>
                                    <td class="align-middle">{{ $item->name }}</td>
                                    <td class="align-middle">{{ $item->description }}</td>
                                    <td class="align-middle">{{ $item->price }}</td>
                                    <td class="align-middle">{{ $item->category }}</td>
                                    <td class="align-middle">
                                        <div class="btn-toolbar flex-nowrap justify-content-evenly">
                                            <div class="btn-group me-2">
                                                <a class="btn btn-sm btn-block btn-warning text-dark" href="{{ route('items.edit', $item->id) }}">UPDATE   </a>
                                            </div>
                                            <div class="btn-group me-2">
                                                <a class="btn btn-sm btn-block btn-danger text-white" href="{{ route('items.edit', $item->id) }}">DELETE   </a>
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
@endsection
