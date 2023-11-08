<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilakhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasilakhirs', function (Blueprint $table) {
            $table->id();
            $table->integer('D_MOST');
            $table->integer('I_MOST');
            $table->integer('S_MOST');
            $table->integer('C_MOST');
            $table->integer('bintang_MOST');
            $table->integer('D_LEST');
            $table->integer('I_LEST');
            $table->integer('S_LEST');
            $table->integer('C_LEST');
            $table->integer('bintang_LEST');
            $table->foreignId('userid');
            $table->string('nama');
            $table->string('namasekolah');
            $table->foreignId('sekolahid');
            $table->foreignId('afiliatorid');
            $table->string('nisn');
            $table->string('jeniskelamin');
            $table->date('tanggallahir');
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
        Schema::dropIfExists('hasilakhirs');
    }
}
