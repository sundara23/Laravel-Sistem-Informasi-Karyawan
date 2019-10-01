<?php

namespace App\Http\Controllers;

use App\employee;
use App\position;
use App\status;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showAllStatus = status::all();
        $showAllJabatan = position::all();
        $showAll = employee::all();
        return view('content.karyawan.index', compact('showAll', 'showAllStatus', 'showAllJabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required',
            'umur' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
            'tgl_lahir' => 'required',
            'tmp_lahir' => 'required',
            'id_jabatan' => 'required',
            'tgl_masuk' => 'required',
            'id_status' => 'required'
        ]);

        Employee::create($request->all());
        return redirect('/karyawan')->with('status', 'Data karyawan berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
            'tgl_lahir' => 'required',
            'tmp_lahir' => 'required',
            'id_jabatan' => 'required',
            'tgl_masuk' => 'required',
            'id_status' => 'required'
        ]);
        employee::where('id', $employee->id)
            ->update([
                'nama' => $request->nama,
                'umur' => $request->umur,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
                'tgl_lahir' => $request->tgl_lahir,
                'tmp_lahir' => $request->tmp_lahir,
                'id_jabatan' => $request->id_jabatan,
                'tgl_masuk' => $request->tgl_masuk,
                'id_status' => $request->id_status
            ]);
        return redirect('/karyawan')->with('status', 'Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        employee::destroy($employee->id);
        return redirect('/karyawan')->with('status', 'Data Berhasil Dihapus !');
    }
}
