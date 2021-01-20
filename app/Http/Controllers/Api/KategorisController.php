<?php

namespace App\Http\Controllers;
use App\Models\Kategoris;
use App\Models\Items;
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
        $kategoris = Kategoris::orderby('id', 'desc') -> paginate(3);

        return view('kategoris.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoris.create');
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
            'name' => 'required|unique:kategoris|max:255',
            'description' => 'required',
        ]);

        $kategori = new Kategoris;

        $kategori->name = $request->name;
        $kategori->description = $request->description;
        $kategori->save();

        return redirect('/kategoris');
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
        return view('kategoris.show', ['kategori' => $kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategoris::where('id', $id)->first();
        return view('kategoris.edit', ['kategori' => $kategori]);
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
        Kategoris::find($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('/kategoris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategoris::find($id)->delete();
        return redirect('/kategoris');
    }

    public function addmember($id)
    {
        $kategori = Items::where('kategoris_id', '=', 0)->get();
        $kategori = Kategoris::where('id', $id)->first();
        return view('kategoris.addmember', ['kategori' => $kategori, 'kategori' => $kategori]);
    }

    public function updateaddmember(Request $request, $id)
    {
        $kategori = Items::where('id', $request->friend_id)->first();
        Items::find($kategori->id)->update([
            'kategoris_id' => $id
        ]);

        return redirect('/kategoris/addmember/'. $id);
    }

    public function deleteaddmember(Request $request, $id)
    {

        Items::find($id)->update([
            'kategoris_id' => 0
        ]);

        return redirect('/kategoris');
    }

}