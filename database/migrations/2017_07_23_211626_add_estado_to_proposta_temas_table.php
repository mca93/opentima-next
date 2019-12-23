<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoToPropostaTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposta_temas', function (Blueprint $table) {
          $table->string('estado')->after('designacao')->default('Disponivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposta_temas', function (Blueprint $table) {
        $table->dropColumn('estado');
        });
    }
}
