<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasDuvidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_duvidas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('categoria_id')->unsigned();
          $table->integer('duvida_id')->unsigned();
          $table->timestamps();

          $table->foreign('categoria_id')->references('id')->on('categorias');
          $table->foreign('duvida_id')->references('id')->on('duvidas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_duvidas');
    }
}
