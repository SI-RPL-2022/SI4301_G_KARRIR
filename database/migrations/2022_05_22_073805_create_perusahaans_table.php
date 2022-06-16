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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('telepon');
            $table->string('alamat')->nullable();
            $table->string('tentang_kami')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('foto')->nullable();
            $table->string('industri')->nullable();
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
        Schema::dropIfExists('perusahaans');
    }
};
