<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->integer('annee')->unsigned()->primary();
            $table->string('nomEquipe');
            $table->string('urlImageMedia');
            $table->string('urlImageEquipe');
            $table->string('lieu');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('description');
            $table->boolean('publie');
            $table->boolean('actif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editions');
    }
}
