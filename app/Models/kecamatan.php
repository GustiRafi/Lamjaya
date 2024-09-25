<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelurahans()
    {
        return $this->hasMany(kelurahan::class);
    }
}
