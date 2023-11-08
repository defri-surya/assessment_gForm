<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepribadiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepribadians', function (Blueprint $table) {
            $table->id();
            $table->string('typekepribadian');
            $table->text('sifat');
            $table->text('deskripsi');
            $table->text('rekomendasipekerjaan');
            $table->text('rekomendasijurusan');
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
        Schema::dropIfExists('kepribadians');
    }
}
