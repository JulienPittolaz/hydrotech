<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupeRessourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupe_ressource', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groupe_id')->unsigned();
            $table->integer('ressource_id')->unsigned();
            $table->string('role');
            $table->timestamps();
            $table->foreign('ressource_id')->references('id')->on('ressources')->onDelete("cascade");
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete("cascade");
            $table->boolean('actif')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupe_ressource');
    }
}
