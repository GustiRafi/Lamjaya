@extends('layouts.dashboard')
@section('content')
<h1>Provinsi</h1>
<a href="/dashboard/provinsi/create" class="btn btn-primary">Tambah Provinsi</a>
<table class="table table-responsive mt-5 table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Nama Provinsi</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($provinsis as $key => $provinsi)
        <tr>
          <th scope="row">{{ $key + 1 }}</th>
          <td>{{ $provinsi->kode }}</td>
          <td>{{ $provinsi->nama }}</td>
          <td>
            @if($provinsi->is_active == 1)
                <input type="checkbox" checked disabled>
            @else
                <input type="checkbox" disabled>
            @endif
          <td class="d-flex">
            <a href="/dashboard/provinsi/edit/{{$provinsi->id}}" class="btn btn-primary me-2">Edit</a>
            <form action="/dashboard/provinsi/delete/{{$provinsi->id}}" method="POST">
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
