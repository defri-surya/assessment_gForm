<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->enum('jeniskelamin', ['Laki-Laki', 'Perempuan']);
            $table->date('tanggallahir');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['superadmin', 'gurubk', 'siswa', 'afiliator']);
            $table->enum('status', ['aktif', 'pasif']);
            $table->foreignId('sekolahid')->nullable();
            $table->foreignId('afiliatorid')->nullable();
            $table->foreignId('gurubkid')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nip')->nullable();
            $table->rememberToken();
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
}
