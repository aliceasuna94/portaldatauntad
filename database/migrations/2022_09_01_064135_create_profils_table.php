<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode');
            $table->integer('tahun');
            $table->integer('akreditasi')->nullable();
            $table->string('berlaku')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('sk_akreditasi')->nullable();
            $table->string('lembaga')->nullable();
            $table->integer('akreditasi_internasional')->nullable();
            $table->string('berlaku_internasional')->nullable();
            $table->string('sk_akreditasi_internasional')->nullable();
            $table->string('lembaga_internasional')->nullable();
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
        Schema::dropIfExists('profils');
    }
}
