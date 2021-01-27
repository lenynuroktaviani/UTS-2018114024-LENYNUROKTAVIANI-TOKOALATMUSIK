<?php

namespace App\Http\Controllers\Api;

use App\Models\Kategoris;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategoris::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Daftar data kategoris',
            'data' => $kategoris
        ], 200);
    } /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategoris|max:255',
            'description' => 'required',
        ]);

        $kategoris = Kategoris::create([
            'name'=> $request->name,
            'description' => $request->description
            ]);

            if($kategoris)
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Kategoris berhasil di tambahkan',
                    'data' => $kategoris
                ], 200);
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Kategoris gagal di tambahkan',
                'data' => $kategoris
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
        $kategori = Kategoris::where('id', $id)->first();    
        return response()->json([
            'success' => true,
            'message' => 'Detail Kategoris',
            'data' => $kategori
        ], 200);
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
            'name' => 'required|unique:kategoris|max:255',
            'description' => 'required',
        ]);

        $g = Kategoris::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategoris Updated',
            'data' => $g
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $cek = Kategoris::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategoris Deleted',
            'data' => $cek
        ], 200);
    }

}