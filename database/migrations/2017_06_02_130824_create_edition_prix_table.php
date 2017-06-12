<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionPrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_prix', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edition_id')->unsigned();
            $table->integer('prix_id')->unsigned();
            $table->timestamps();
            $table->foreign('prix_id')->references('id')->on('prixs')->onDelete("cascade");
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete("cascade");
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
        Schema::dropIfExists('edition_prix');
    }
}
