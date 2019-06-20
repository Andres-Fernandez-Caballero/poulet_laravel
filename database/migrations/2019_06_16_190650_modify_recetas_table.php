<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recetas', function (Blueprint $table) {
            $table->string('dificultad');
            $table->string('tiempo_preparacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recetas', function (Blueprint $table) {
            $table->dropColumn('dificultad');
            $table->dropColumn('tiempo_preparacion');
        });
    }
}
