<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\provinsi;

class provinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsis = provinsi::all();

        return view('provinsi.index', [ 'provinsis' => $provinsis ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validate = $request->validate([
            "kode" => 'required|unique:provinsis,kode',
            'nama' => 'required',
            "is_active" => 'required',
        ]);


        provinsi::create($request->all());

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
        $provinsi = provinsi::find($id);

        return view('provinsi.edit', ["provinsi" => $provinsi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            "kode" => "required|unique:provinsis,kode,$id",
            'nama' => 'required',
            "is_active" => 'required',
        ]);

        $provinsi = provinsi::find($id);

        $provinsi->update($validate);

        return redirect()->back()->with('success', 'Data Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provinsi = provinsi::find($id);

        $provinsi->delete();

        return redirect()->back()->with('success', 'Data Berhasil di hapus');
    }
}
