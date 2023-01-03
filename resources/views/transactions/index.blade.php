@extends('layout.layout')

@section('title', 'Transaction History')

@section('content')
    <h3 class="text-dark fw-bold ms-4 mt-3">Transaction History</h3>
    @if (count($transactions) == 0)
        <div class="container-fluid mx-auto my-auto">
            <h5 class="text-center fw-bold">
                Transaction History is empty! Let's go Shopping :)
            </h5>
        </div>
    @elseif (count($transactions) > 0)
        <div class="container-fluid">
            @foreach ($dates as $date)
            <h4 class="text-dark fw-bold ms-4 mt-3">{{ $date->format('d:m:Y') }}</h4>
            <div class="table-responsive px-3">
                <table class="table table-bordered table-sm table-striped no-footer table-warning border-primary">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th class="align-middle">No</th>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Item Name</th>
                            <th class="align-middle">Item Price</th>
                            <th class="align-middle">Quantity</th>
                            <th class="align-middle">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($grandTotal = 0)
                        @php ($i = 1)
                        @foreach ($transactions as $transaction)
                        @if ($transaction->created_at == $date)
                        @php($total = $transaction->item->price * $transaction->quantity)
                        <tr class="text-center">
                            <td class="align-middle">{{ $i }}</td>
                            <td class="align-middle"><img src="/storage/images/item/{{ $transaction->item->image }}" alt="" style="height: 70px; width: 100px"></td>
                            <td class="align-middle">{{ $transaction->item->name }}</td>
                            <td class="align-middle">{{ $transaction->item->price }}</td>
                            <td class="align-middle">{{ $transaction->quantity }}</td>
                            <td class="align-middle">{{ $total }}</td>
                        </tr>
                        @php ($i = $i + 1)
                        @php($grandTotal = $grandTotal + $total)
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container-fluid">
                <h4 class="text-dark fw-bold ms-4 mt-3">Grand total: {{ $grandTotal }}</h4>
            </div>
        </div>
        @endforeach
    @endif
@endsection