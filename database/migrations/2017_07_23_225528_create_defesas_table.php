<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supervisao_id')->unsigned()->unique();
            $table->integer('oponente_id')->unsigned();
            $table->string('data');
            $table->string('hora');
            $table->timestamps();

            $table->foreign('supervisao_id')->references('id')->on('supervisaos');
            $table->foreign('oponente_id')->references('id')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defesas');
    }
}
