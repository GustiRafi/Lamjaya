@extends('layouts.dashboard')
@section('content')
<h1>kelurahan</h1>
<a href="/dashboard/kelurahan/create" class="btn btn-primary">Tambah kelurahan</a>
<table class="table table-responsive mt-5 table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Nama kelurahan</th>
        <th scope="col">Kecamatan</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($kelurahans as $key => $kelurahan)
        <tr>
          <th scope="row">{{ $key + 1 }}</th>
          <td>{{ $kelurahan->kode }}</td>
          <td>{{ $kelurahan->nama }}</td>
          <td>{{ $kelurahan->kecamatanId->nama }}</td>
          <td>
            @if($kelurahan->is_active == 1)
                <input type="checkbox" checked disabled>
            @else
                <input type="checkbox" disabled>
            @endif
          <td class="d-flex">
            <a href="/dashboard/kelurahan/edit/{{$kelurahan->id}}" class="btn btn-primary me-2">Edit</a>
            <form action="/dashboard/kelurahan/delete/{{$kelurahan->id}}" method="POST">
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
