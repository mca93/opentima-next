<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescricaoProblemaToCandidatosTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidatos_temas', function (Blueprint $table) {
          $table->string('descricao_problema')->after('problema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidatos_temas', function (Blueprint $table) {
          $table->dropColumn('descricao_problema');

        });
    }
}
