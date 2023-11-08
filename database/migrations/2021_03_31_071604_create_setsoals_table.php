<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetsoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setsoals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolahid');
            $table->foreignId('kategorisoalid');
            $table->enum('status', ['aktif', 'pasif']);
            $table->date('tanggalmulai');
            $table->date('tanggalselesai');
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
        Schema::dropIfExists('setsoals');
    }
}
