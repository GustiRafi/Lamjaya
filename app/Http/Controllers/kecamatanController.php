<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kecamatan;

class kecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = kecamatan::all();

        return view('kecamatan.index', [ 'kecamatans' => $kecamatans ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validate = $request->validate([
            "kode" => 'required|unique:kecamatans,kode',
            'nama' => 'required',
            "is_active" => 'required',
        ]);


        kecamatan::create($request->all());

        return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kecamatan = kecamatan::find($id);

        return view('kecamatan.edit', ["kecamatan" => $kecamatan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            "kode" => "required|unique:kecamatans,kode,$id",
            'nama' => 'required',
            "is_active" => 'required',
        ]);

        $kecamatan = kecamatan::find($id);

        $kecamatan->update($validate);

        return redirect()->back()->with('success', 'Data Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kecamatan = kecamatan::find($id);

        $kecamatan->delete();

        return redirect()->back()->with('success', 'Data Berhasil di hapus');
    }
}
