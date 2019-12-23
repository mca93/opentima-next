<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia_inicio');
            $table->string('mes_inicio');
            $table->string('ano_inicio');
            $table->string('dia_limite');
            $table->string('mes_limite');
            $table->string('ano_limite');
            $table->integer('tema_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();
            $table->string('papel')->default('supervisor');
            $table->integer('estudante_id')->unsigned();
            $table->timestamps();


            $table->foreign('tema_id')->references('id')->on('temas');
            $table->foreign('supervisor_id')->references('id')->on('docentes');
            $table->foreign('estudante_id')->references('id')->on('estudantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisaos');
    }
}
