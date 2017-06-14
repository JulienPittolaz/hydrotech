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
            $table->increments('id');
            $table->integer('annee')->unsigned();
            $table->string('nomEquipe');
            $table->string('urlImageMedia');
            $table->string('lieu');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->text('description');
            $table->boolean('publie');
            $table->boolean('actif')->default(true);
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
