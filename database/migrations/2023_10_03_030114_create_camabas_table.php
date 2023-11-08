<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamabasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camabas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('gurubk_id');
            $table->foreignId('afiliator_id');
            $table->foreignId('kampus_id')->nullable();
            $table->foreignId('jurusan_id')->nullable();
            $table->string('biaya')->nullable();
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
        Schema::dropIfExists('siswas');
    }
}
