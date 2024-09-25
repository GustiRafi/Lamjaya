@extends('layouts.dashboard')
@section('content')
<form action="/dashboard/pegawai/update/{{$pegawai->id}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama pegawai</label>
      <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
      <label for="nip" class="form-label">Tempat Lahir</label>
      <select class="form-select" name="tempat_lahir">
          @foreach ($provinsis as $item)
              <option value="{{ $item->id }}">{{ $item->nama }}</option>
          @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
    </div>
    <div class="mb-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select class="form-select" name="jenis_kelamin">
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat">
    </div>
    <div class="mb-3">
        <label for="agama" class="form-label">agama</label>
        <input type="text" class="form-control" id="agama" name="agama">
    </div>
    <div class="mb-3">
        <label for="provinsi" class="form-label">Provinsi</label>
        <select class="form-select" name="provinsi">
            @foreach ($provinsis as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <select class="form-select" name="kecamatan">
            @foreach ($kecamatans as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    {{-- <div class="mb-3">
        <label for="nama" class="form-label">kelurahan/label>
        <select class="form-select" name="kelurahan">
            @foreach ($kecamatans->kelurahans as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection