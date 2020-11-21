<?php

namespace App\Http\Controllers;

use App\Models\Pembelis;
use Illuminate\Http\Request;

class PembelisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelis = Pembelis::orderby('id', 'desc')->paginate(3);

        return view('pembelis.index', compact('pembelis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelis.create');
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
            'nama_user' => 'required|unique:pembelis|max:255|',
            'no_telp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $pembelis = new Pembelis;

        $pembelis->nama_user = $request->nama_user;
        $pembelis->no_telp = $request->no_telp;
        $pembelis->alamat = $request->alamat;

        $pembelis->save();

        return redirect('/pembelis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = Pembelis::where('id', $id)->first();
       
        return view('pembelis.show', ['pembeli' => $pembeli]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembeli = Pembelis::where('id', $id)->first();
       
        return view('pembelis.edit', ['pembeli' => $pembeli]);
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
            'nama_user' => 'required|unique:pembelis|max:255|',
            'no_telp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        Pembelis::find($id)->update([
            'nama_user' => $request->nama_user,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
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
        Pembelis::find($id)->delete();
        return redirect('/pembelis');
    }
}
