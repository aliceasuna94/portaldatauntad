<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('kode_prodi');
            $table->integer('tahun');
            $table->integer('baru')->nullable();
            $table->integer('aktif')->nullable();
            $table->integer('nonaktif')->nullable();
            $table->integer('cuti')->nullable();
            $table->integer('lulus')->nullable();
            $table->integer('tepat_waktu')->nullable();
            $table->integer('bidikmisi')->nullable();
            $table->integer('tugas_akhir')->nullable();
            $table->string('upload1')->nullable();
            $table->string('upload2')->nullable();
            $table->string('upload3')->nullable();
            $table->string('upload4')->nullable();
            $table->string('upload5')->nullable();
            $table->string('upload6')->nullable();
            $table->string('upload7')->nullable();
            $table->string('upload8')->nullable();
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
