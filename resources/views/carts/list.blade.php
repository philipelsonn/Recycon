@extends('layout.layout')

@section('title', 'Cart')

@section('content')
    <h3 class="text-dark fw-bold ms-4 mt-3">Manage Item</h3>
    @if (count($transactions) == 0)
        <div class="container-fluid mx-auto my-auto">
            <h5 class="text-center fw-bold">
                Cart is empty! Let's go Shopping :)
            </h5>
        </div>
    @elseif (count($transactions) > 0)
        <div class="container-fluid">
            <div class="table-responsive px-3">
                <table class="table table-bordered table-sm table-striped no-footer table-warning border-primary">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th class="align-middle">No</th>
                            <th class="align-middle">Item Image</th>
                            <th class="align-middle">Item Price</th>
                            <th class="align-middle">Quantity</th>
                            <th class="align-middle">Total Price</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($grandTotal = 0)
                        @php ($i = 1)
                        @foreach ($transactions as $transaction)
                        @php($total = $transaction->item->price * $transaction->quantity)
                            <tr class="text-center">
                                <td class="align-middle">{{ $i }}</td>
                                <td class="align-middle"><img src="/storage/images/item/{{ $transaction->item->image }}" alt="" style="height: 70px; width: 100px"></td>
                                <td class="align-middle">{{ $transaction->item->price }}</td>
                                <td class="align-middle">{{ $transaction->quantity }}</td>
                                <td class="align-middle">{{ $total }}</td>
                                <td class="align-middle">
                                    <div class="btn-toolbar flex-nowrap justify-content-evenly">
                                        <div class="btn-group me-2">
                                            <a class="btn btn-sm btn-block btn-warning text-dark fw-bold" href="{{ route('editCart', $transaction->id) }}">UPDATE</a>
                                        </div>
                                        <form method="POST" action="{{ route('deleteCart', $transaction->id) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value='DELETE'>
                                            <button type="submit" class="btn btn-sm btn-block btn-danger text-white fw-bold"
                                            onclick="return confirm('Are you sure you want to permanently delete the data?')">
                                            DELETE</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @php ($i = $i + 1)
                        @php($grandTotal = $grandTotal + $total)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @if (count($transactions) > 0)
    <div class="container-fluid">
        <h4 class="text-dark fw-bold ms-3 mt-3">Grand total: {{ $grandTotal }}</h4>
        <form method="POST" action="{{ route('createTransaction') }}"
            enctype="multipart/form-data">
            @method('UPDATE')
            @csrf
            <div class="row ms-2">
                <div class="form-group mt-3">
                    <label for="receiver_name" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Receiver Name')}}</label>
                    <div class="col-md-11">
                        <input type="text" id="receiver_name" name="receiver_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="receiver_address" class="col-md-3 col-form-label text-sm-left fw-bold">
                        {{_('Receiver Address')}}</label>
                    <div class="col-md-11">
                        <textarea rows="3" type="text" id="receiver_address" name="receiver_address" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group row mt-3 mb-4">
                    <div class="d-flex justify-content-start">
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-1 rounded-20 bg-warning fw-bold">Checkout ({{ count($transactions) }})</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endif
@endsection
