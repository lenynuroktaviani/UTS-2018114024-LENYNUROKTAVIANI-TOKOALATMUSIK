<?php

namespace App\Http\Controllers\Api;

use App\Models\Items;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::orderby('id', 'desc') -> paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Data Item',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:items|max:255',
            'merk' => 'required',
            'harga' => 'required|numeric',
        ]);

        $items = Items::create([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'harga' => $request->harga,
        ]);

        if($items)
        {
            return response()->json([
                'success' => true,
                'message' => 'Item Berhasil Ditambahkan',
                'data' => $items
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Item Gagal Ditambahkan',
                'data' => $items
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
} 