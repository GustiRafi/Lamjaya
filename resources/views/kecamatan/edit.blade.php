@extends('layouts.dashboard')
@section('content')
<form action="/dashboard/kecamatan/update/{{ $kecamatan->id }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="kode" class="form-label">Kode kecamatan</label>
      <input type="text" class="form-control" id="kode" name="kode" value="{{$kecamatan->kode}}">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama kecamatan</label>
      <input type="text" class="form-control" id="nama" name="nama"  value="{{$kecamatan->nama}}">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Status</label>
        <select class="form-select" name="is_active">
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
