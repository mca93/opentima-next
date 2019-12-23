<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao');
            $table->integer('peso');
            $table->string('prioridade');
            $table->string('estado');
            $table->string('descricao');
            $table->integer('supervisao_id')->unsigned();
            $table->timestamps();

              $table->foreign('supervisao_id')->references('id')->on('supervisaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
