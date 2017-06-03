<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieSponsorEditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorieSponsor_edition', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorieSponsor_id')->unsigned();
            $table->integer('edition_id')->unsigned();
            $table->timestamps();
            $table->foreign('categorieSponsor_id')->references('id')->on('categorieSponsors')->onDelete("cascade");
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
        Schema::dropIfExists('categorieSponsor_edition');
    }
}
