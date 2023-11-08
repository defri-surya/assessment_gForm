<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareBKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_b_k_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('camaba_id');
            $table->foreignId('gurubk_id');
            $table->foreignId('afiliatorid');
            $table->string('fee_sistem');
            $table->string('fee_bk');
            $table->string('fee_afiliator');
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
        Schema::dropIfExists('share_b_k_s');
    }
}
