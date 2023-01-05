<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $status = "TRANSACTION";
        $user_id = auth()->user()->id;
        $dates = Transaction::select('created_at')->where('status', $status)->distinct()->get()->pluck('created_at');

        return view('transactions.index', [
            'transactions' => Transaction::where('user_id', $user_id)->where('status', $status)->get(),
            'dates' =>$dates
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
                'created_at' => now() 
            ]);
        }

        return redirect()->route('transaction');
    }
}
