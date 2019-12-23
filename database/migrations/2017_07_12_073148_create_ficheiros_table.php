<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicheirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficheiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path')->unique();
            $table->string('extensao');
            $table->string('tamanho');
            $table->integer('acta_id')->unsigned();
            $table->string('mime')->default('application/pdf');
            $table->timestamps();

            $table->foreign('acta_id')->references('id')->on('actas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficheiros');
    }
}
