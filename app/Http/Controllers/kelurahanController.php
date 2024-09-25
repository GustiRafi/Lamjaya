<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kecamatan;
use App\Models\kelurahan;

class kelurahanController extends Controller
{
    public function index()
    {
        $kelurahans = kelurahan::all();

        return view('kelurahan.index', [ 'kelurahans' => $kelurahans ]);
    }


    public function getKelurahan($id)
    {
        $kelurahans = kelurahan::where('kecamatan', $id)->get();

        return response()->json($kelurahans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatans = kecamatan::all();
        return view('kelurahan.create', ["kecamatans" => $kecamatans]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validate = $request->validate([
            "kode" => 'required|unique:kelurahans,kode',
            'nama' => 'required',
            "kecamatan" => 'required',
            "is_active" => 'required',
        ]);


        kelurahan::create($request->all());

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
        $kelurahan = kelurahan::find($id);
        $kecamatans = kecamatan::all();

        return view('kelurahan.edit', ["kelurahan" => $kelurahan, "kecamatans" => $kecamatans]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validate = $request->validate([
            "kode" => "required|unique:kelurahans,kode,$id",
            'nama' => 'required',
            "kecamatan" => 'required',
            "is_active" => 'required',
        ]);

        $kelurahan = kelurahan::find($id);

        $kelurahan->update($validate);

        return redirect()->back()->with('success', 'Data Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelurahan = kelurahan::find($id);

        $kelurahan->delete();

        return redirect()->back()->with('success', 'Data Berhasil di hapus');
    }
}
