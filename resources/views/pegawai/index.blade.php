@extends('layouts.dashboard')
@section('content')
<h1>pegawai</h1>
<a href="/dashboard/pegawai/create" class="btn btn-primary">Tambah pegawai</a>
<table class="table table-responsive mt-5 table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Tempat Lahir</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Agama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Provinsi</th>
        <th scope="col">Kecamatan</th>
        <th scope="col">pegawai</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pegawais as $key => $pegawai)
        <tr>
          <th scope="row">{{ $key + 1 }}</th>
          <td>{{ $pegawai->nama }}</td>
          <td>{{ $pegawai->tempat_lahir->nama }}</td>
          <td>{{ $pegawai->tanggal_lahir }}</td>
          <td>{{ $pegawai->jenis_kelamin == 'L' ? "Laki - Laki" : "Perempuan" }}</td>
          <td>{{ $pegawai->agama }}</td>
          <td>{{ $pegawai->alamat }}</td>
          <td>{{ $pegawai->provinsiId->nama }}</td>
          <td>{{ $pegawai->kecamatanId->nama }}</td>
          <td>{{ $pegawai->kelurahanId->nama }}</td>
          <td class="d-flex">
            <a href="/dashboard/pegawai/edit/{{$pegawai->id}}" class="btn btn-primary me-2">Edit</a>
            <form action="/dashboard/pegawai/delete/{{$pegawai->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
