<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncontrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encontros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supervisao_id')->unsigned();
            $table->date('data');
            $table->string('hora');
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
        Schema::dropIfExists('encontros');
    }
}
