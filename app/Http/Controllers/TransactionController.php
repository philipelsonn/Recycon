<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $status = "TRANSACTION";
        $user_id = auth()->user()->id;
        return view('transactions.index', [
            'transactions' => Transaction::where('user_id', $user_id)->where('status', $status)->get()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'receiver_name' => 'required|string',
            'receiver_address' => 'required|string'
        ]);
        
        $status = "CART";
        $user_id = auth()->user()->id;
        $transactions = Transaction::where('user_id', $user_id)->where('status', $status)->get();
    
        foreach($transactions as $transaction) {
            $transaction->update([
                'status' => "TRANSACTION",
                'receiver_name' => $request->receiver_name,
                'receiver_address' => $request->receiver_address,
            ]);
        }

        return redirect()->route('transaction');
    }
}
