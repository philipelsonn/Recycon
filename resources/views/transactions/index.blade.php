@extends('layout.layout')

@section('title', 'Transaction History')

@section('content')
    <h3 class="text-dark fw-bold ms-4 mt-3">My History Transaction</h3>
    @if (count($transactions) == 0)
        <div class="container-fluid mx-auto my-auto">
            <h5 class="text-center fw-bold">
                Transaction History is empty! Let's go Shopping :)
            </h5>
        </div>
    @elseif (count($transactions) > 0)
        <div class="container-fluid">
            @php($count = 1)
            @foreach ($dates as $date)
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $count }}">
                    <button class="accordion-button collapsed bg-info bg-opacity-25 border border-info text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $count }}" aria-expanded="false" aria-controls="flush-collapse{{ $count }}">
                        {{ $date->format('Y-m-d') }}
                    </button>
                    </h2>
                    <div id="flush-collapse{{ $count }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $count }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
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
                                        <td class="align-middle">IDR. {{ $total }}</td>
                                    </tr>
                                    @php ($i = $i + 1)
                                    @php($grandTotal = $grandTotal + $total)
                                    @endif
                                    @endforeach
                                    <tr class="text-center">
                                        <td colspan="5">Grand total</td>
                                        <td>IDR. {{ $grandTotal }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @php($count = $count + 1)
            @endforeach
        </div>
    @endif
@endsection
