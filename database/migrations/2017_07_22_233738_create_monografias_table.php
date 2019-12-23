<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonografiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monografias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado')->default('Pendente');
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
        Schema::dropIfExists('monografias');
    }
}
