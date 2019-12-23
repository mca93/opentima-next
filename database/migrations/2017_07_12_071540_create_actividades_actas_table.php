<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_actas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actividade_id')->unsigned();
            $table->integer('acta_id')->unsigned();
            $table->timestamps();

            $table->foreign('actividade_id')->references('id')->on('actividades');
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
        Schema::dropIfExists('actividades_actas');
    }
}
