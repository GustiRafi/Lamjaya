<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('tempat_lahir')->constrained("provinsis")->cascadeOnDelete();
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string("agama");
            $table->text("alamat");
            $table->foreignId('kelurahan')->constrained('kelurahans')->cascadeOnDelete();
            $table->foreignId('kecamatan')->constrained('kecamatans')->cascadeOnDelete();
            $table->foreignId('provinsi')->constrained('provinsis')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
