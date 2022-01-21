<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePorudzbinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porudzbinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hrana');
            $table->foreignId('user');
            $table->dateTime('datum');
            $table->float('dostava_cena');
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
        Schema::dropIfExists('porudzbinas');
    }
}
