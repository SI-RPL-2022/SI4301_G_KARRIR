<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('jabatan');
            $table->string('lokasi');
            $table->string('tipe');
            $table->string('gaji');
            $table->string('periode');
            $table->string('regis_start');
            $table->string('regis_end');
            $table->string('deskripsi');
            $table->foreignId('perusahaan_id');
            $table->integer('verifikasi')->default('1');
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
        Schema::dropIfExists('lowongans');
    }
};
