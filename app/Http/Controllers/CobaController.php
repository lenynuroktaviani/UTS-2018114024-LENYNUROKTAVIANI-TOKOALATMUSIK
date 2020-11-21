<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class CobaController extends Controller
{

    public function index()
    {
        $items = Items::orderBy('id', 'desc')->paginate(3);
        
        return view('items.index', compact('items'));
    }
    public function create()
    {   
        return view('items.create');
    }
    public function store(Request $request)
    {
        //validate the request...
            $request->validate([
                'nama_barang' => 'required|unique:items|max:255|',
                'merk' => 'required',
                'harga' => 'required|numeric'
            ]);

        $items = new Items;

        $items->nama_barang = $request->nama_barang;
        $items->merk = $request->merk;
        $items->harga = $request->harga;

        $items->save();
        return redirect('/');
    }
    public function show($id)
    {
        $item = items::where('id', $id)->first();
       
        return view('items.show', ['item' => $item]);
    }
    public function edit($id)
    {
        $item = Items::where('id', $id)->first();
       
        return view('items.edit', ['item' => $item]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|unique:items|max:255|',
            'merk' => 'required',
            'harga' => 'required|numeric'
        ]);

        Items::find($id)->update([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'harga' => $request->harga
            ]);
        return redirect('/');
        }
        public function destroy($id)
    {
        Items::find($id)->delete();
        return redirect('/');
    }
}
