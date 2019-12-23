<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao');
            $table->string('referencia');
            $table->string('descricao');
            $table->integer('area_id')->unsigned();
            $table->integer('estudante_id')->unsigned();
            $table->string('status')->default('Não alocado');
            $table->timestamps();

            $table->foreign('estudante_id')->references('id')->on('estudantes');
            $table->foreign('area_id')->references('id')->on('areas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temas');
    }
}
