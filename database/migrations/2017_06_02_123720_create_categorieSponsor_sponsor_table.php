<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieSponsorSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorieSponsor_sponsor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorieSponsor_id')->unsigned();
            $table->integer('sponsor_id')->unsigned();
            $table->timestamps();
            $table->foreign('categorieSponsor_id')->references('id')->on('categorieSponsor')->onDelete("cascade");
            $table->foreign('sponsor_id')->references('id')->on('sponsor')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorieSponsor_sponsor');
    }
}
