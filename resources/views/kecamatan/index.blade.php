@extends('layouts.dashboard')
@section('content')
<h1>kecamatan</h1>
<a href="/dashboard/kecamatan/create" class="btn btn-primary">Tambah kecamatan</a>
<table class="table table-responsive mt-5 table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Nama kecamatan</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($kecamatans as $key => $kecamatan)
        <tr>
          <th scope="row">{{ $key + 1 }}</th>
          <td>{{ $kecamatan->kode }}</td>
          <td>{{ $kecamatan->nama }}</td>
          <td>
            @if($kecamatan->is_active == 1)
                <input type="checkbox" checked disabled>
            @else
                <input type="checkbox" disabled>
            @endif
          <td class="d-flex">
            <a href="/dashboard/kecamatan/edit/{{$kecamatan->id}}" class="btn btn-primary me-2">Edit</a>
            <form action="/dashboard/kecamatan/delete/{{$kecamatan->id}}" method="POST">
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
