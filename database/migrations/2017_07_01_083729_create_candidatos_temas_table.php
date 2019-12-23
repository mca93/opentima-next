<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos_temas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('proposta_tema_id')->unsigned();
          $table->integer('candidato_id')->unsigned();
          $table->timestamps();

          $table->foreign('proposta_tema_id')->references('id')->on('proposta_temas');
          $table->foreign('candidato_id')->references('id')->on('candidato_temas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos_temas');
    }
}
