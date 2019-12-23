<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudantesDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudantes_disciplinas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('estudante_id')->unsigned();
          $table->integer('disciplina_id')->unsigned();
          $table->timestamps();

          $table->foreign('estudante_id')->references('id')->on('estudantes');
          $table->foreign('disciplina_id')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudantes_disciplinas');
    }
}
