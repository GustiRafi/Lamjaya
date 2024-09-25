<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tempat_lahir()
    {
        return $this->belongsTo(provinsi::class, 'tempat_lahir', 'id');
    }

    public function provinsiId()
    {
        return $this->belongsTo(provinsi::class, 'provinsi', 'id');
    }

    public function kecamatanId(){
        return $this->belongsTo(kecamatan::class,'kecamatan','id');
    }


    public function kelurahanId(){
        return $this->belongsTo(kelurahan::class,'kelurahan','id');
    }
}
