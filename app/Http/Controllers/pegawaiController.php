<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;
use App\Models\provinsi;
use App\Models\kecamatan;
use App\Models\kelurahan;

class pegawaiController extends Controller
{
    public function index()
    {
        $pegawais = pegawai::all();

        return view('pegawai.index', [ 'pegawais' => $pegawais ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kecamatans = kecamatan::all();
        $provinsis = provinsi::all();


        return view('pegawai.create', ["kecamatans" => $kecamatans,'provinsis' => $provinsis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $validate = $request->validate([
            'nama' => 'required',
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "agama" => "required",
            "alamat" => "required",
            "provinsi" => "required",
            "kecamatan" => 'required',
            "kelurahan" => 'required',
        ]);


        pegawai::create($request->all());

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
        $kecamatans = kecamatan::all();
        $provinsis = provinsi::all();

        return view('pegawai.edit', ["provinsis" => $provinsis, "kecamatans" => $kecamatans]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validate = $request->validate([
            'nama' => 'required',
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "agama" => "required",
            "alamat" => "required",
            "provinsi" => "required",
            "kecamatan" => 'required',
            "kelurahan" => 'required',
        ]);

        $pegawai = pegawai::find($id);

        $pegawai->update($validate);

        return redirect()->back()->with('success', 'Data Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = pegawai::find($id);

        $pegawai->delete();

        return redirect()->back()->with('success', 'Data Berhasil di hapus');
    }
}
