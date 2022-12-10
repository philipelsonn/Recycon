<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.index', [
            'items' => Item::all()
        ]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|string',
            'name' => 'required|string|max:20',
            'price' => 'required|string|gte:1000',
            'description' => 'required|string|max:200',
            'image' => 'image|required|mimes:jpg,png,jpeg',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $file_name = $request->name . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images/item', $file_name);
        }

        Item::create([
            'item_id' => $request->item_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $file_name,
            'category' => $request->category,
        ]);

        return redirect()->route('items.index');
    }

    public function edit(Item $item)
    {
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'price' => 'required|string|gte:1000',
            'description' => 'required|string|max:200',
            'image_new' => 'image|nullable|mimes:jpg,png,jpeg',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image_new')) {
            $extension = $request->file('image_new')->getClientOriginalExtension();
            $file_name = $request->name . time() . '.' . $extension;
            $path = $request->file('image_new')->storeAs('public/images/item', $file_name);
        } else {
            $file_name = request('image_old');
        }

        $item->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $file_name,
            'category' => $request->category,
        ]);

        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }
}
