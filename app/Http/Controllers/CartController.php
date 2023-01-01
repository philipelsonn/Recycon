<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $status = "CART";
        $user_id = auth()->user()->id;
        return view('carts.list', [
            'transactions' => Transaction::where('user_id', $user_id)->where('status', $status)->get()
        ]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|gt:0',
        ]);

        $item = DB::table('items')->where('item_id', '=', $id)->get()->first();

        Transaction::create([
            'user_id' => auth()->user()->id,
            'item_id' => $item->item_id,
            'quantity' => $request->quantity,
            'status' => "CART"
        ]);

        return redirect()->route('cart');
    }

    public function edit($id)
    {
        return view('carts.edit', [
            'transaction' => Transaction::where('id', $id)->get()->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|gt:0',
        ]);
        
        $transaction = Transaction::where('id', $id)->get()->first();
    
        $transaction->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        $transaction = Transaction::where('id', $id)->get()->first();

        $transaction->delete();

        return redirect()->route('cart');
    }
}
