<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kecamatanId()
    {
        return $this->belongsTo(kecamatan::class,"kecamatan","id");
    }
}
