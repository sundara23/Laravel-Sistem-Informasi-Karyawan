<?php

namespace App\Http\Controllers;

use App\position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showall = Position::all();
        return view('content.jabatan.index', compact('showall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required'
        ]);

        Position::create($request->all());
        return redirect('/jabatan')->with('status', 'Data Jabatan berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, position $position)
    {
        $request->validate([
            'nama_jabatan' => 'required'
        ]);
        Position::where('id', $position->id)
            ->update([
                'nama_jabatan' => $request->nama_jabatan
            ]);
        return redirect('/admin_page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(position $position)
    {
        position::destroy($position->id);
        return redirect('/jabatan')->with('status', 'Data Berhasil Dihapus !');
    }
}
