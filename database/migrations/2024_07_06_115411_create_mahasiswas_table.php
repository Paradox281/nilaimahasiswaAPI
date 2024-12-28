<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('NIM');
            $table->string('nama_mahasiswa');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('jurusan');
            $table->date('tanggal_lahir');
            $table->string('foto')->nullable(); // Foto bisa opsional (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
