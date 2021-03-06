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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('roles')->default('User');
            $table->string('status');
            $table->bigInteger('telepon');
            $table->string('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('cv')->nullable();
            $table->string('organisasi')->nullable();
            $table->string('sertifikasi')->nullable();
            $table->string('portofolio')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('users');
    }
};
