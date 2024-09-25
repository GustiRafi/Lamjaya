@extends('layouts.dashboard')
@section('content')
<form action="/dashboard/kelurahan/update/{{ $kelurahan->id }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="kode" class="form-label">Kode kelurahan</label>
      <input type="text" class="form-control" id="kode" name="kode" value="{{$kelurahan->kode}}">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama kelurahan</label>
      <input type="text" class="form-control" id="nama" name="nama"  value="{{$kelurahan->nama}}">
    </div>
    <div class="mb-3">
      <label for="kecamatan_id" class="form-label">Kecamatan</label>
      <select class="form-select" name="kecamatan">
          @foreach ($kecamatans as $kecamatan)
              <option value="{{ $kecamatan->id }}" {{ $kelurahan->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->nama }}</option>
          @endforeach
      </select>
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
