<?php

namespace App\Http\Controllers\Api;

use App\Models\Pembelis;
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
        $pembelis = Pembelis::orderby('id', 'desc') -> paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Data Pembelis',
            'data' => $pembelis
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
            'nama_user' => 'required|unique:pembelis|max:255',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $pembelis = Pembelis::create([
            'nama_user' => $request->nama_user,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        if($pembelis)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $pembelis
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Ditambahkan',
                'data' => $pembelis
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