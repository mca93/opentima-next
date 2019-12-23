<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicheiroMonografiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficheiro__monografias', function (Blueprint $table) {
          $table->increments('id');
          $table->string('path')->unique();
          $table->string('extensao');
          $table->string('tamanho');
          $table->integer('monografia_id')->unsigned();
          $table->string('mime')->default('application/pdf');
          $table->timestamps();

          $table->foreign('monografia_id')->references('id')->on('monografias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficheiro__monografias');
    }
}
