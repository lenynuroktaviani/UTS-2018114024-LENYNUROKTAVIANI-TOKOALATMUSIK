<?php

namespace App\Http\Controllers;

use App\Models\Pesanans;
use Illuminate\Http\Request;

class PesanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pesanans::orderby('id', 'desc')->paginate(3);

        return view('pesanans.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesanans.create');
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
            'nama_barang' => 'required|unique:pesanans|max:255|',
            'merk' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        $pesanans = new Pesanans;

        $pesanans->nama_barang = $request->nama_barang;
        $pesanans->merk = $request->merk;
        $pesanans->jumlah = $request->jumlah;

        $pesanans->save();

        return redirect('/pesanans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanans::where('id', $id)->first();
       
        return view('pesanans.show', ['pesanan' => $pesanan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanans::where('id', $id)->first();
       
        return view('pesanans.edit', ['pesanan' => $pesanan]);
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
        $request->validate([
            'nama_barang' => 'required|unique:pesanans|max:255|',
            'merk' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        Pesanans::find($id)->update([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'jumlah' => $request->jumlah
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pesanans::find($id)->delete();
        return redirect('/pesanans');
    }
}
