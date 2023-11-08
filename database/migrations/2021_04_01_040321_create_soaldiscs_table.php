<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoaldiscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soaldiscs', function (Blueprint $table) {
            $table->id();
            $table->string('pilihan_a');
            $table->string('keymost_a');
            $table->string('keylest_a');
            $table->string('pilihan_b');
            $table->string('keymost_b');
            $table->string('keylest_b');
            $table->string('pilihan_c');
            $table->string('keymost_c');
            $table->string('keylest_c');
            $table->string('pilihan_d');
            $table->string('keymost_d');
            $table->string('keylest_d');
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
        Schema::dropIfExists('soaldiscs');
    }
}
