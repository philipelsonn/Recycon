@extends('layout.layout')

@section('title', 'Manage Items')

@section('content')
    <h3 class="text-dark fw-bold ms-4 mt-3">Manage Item</h3>
    @if (count($items) == 0)
        <div class="container-fluid mx-auto my-auto">
            <h5 class="text-center fw-bold">
                No Data
            </h5>
        </div>
    @else
        <div class="container-fluid">
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
                                            <a class="btn btn-sm btn-block btn-warning text-dark fw-bold" href="/updateItem/{{ $item->item_id }}">UPDATE</a>
                                        </div>
                                        <form method="POST" action="/deleteItem/{{ $item->item_id }}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-block btn-danger text-white fw-bold"
                                            onclick="return confirm('Are you sure you want to permanently delete the data?')">
                                            DELETE</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @php ($i = $i + 1)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
