<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropostaTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposta_temas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao');
            $table->string('descricao');
            $table->integer('area_id')->unsigned();
            $table->integer('docente_id')->unsigned();
            $table->integer('total_candidatos')->default(0);//tem na base de dados um trigger que actualiza esse atributo.
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('docente_id')->references('id')->on('docentes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposta_temas');
    }
}
