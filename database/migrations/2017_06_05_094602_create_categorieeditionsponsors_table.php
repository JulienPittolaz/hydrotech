<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieeditionsponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorieeditionsponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sponsor_id')->unsigned();
            $table->integer('categorie_id')->unsigned();
            $table->integer('edition_id')->unsigned();
            $table->timestamps();
            $table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete("cascade");
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete("cascade");
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
        Schema::dropIfExists('categorieeditionsponsors');
    }
}
