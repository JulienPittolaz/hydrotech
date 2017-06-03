<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlePresseEditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlePresse_edition', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articlePresse_id')->unsigned();
            $table->integer('edition_id')->unsigned();
            $table->timestamps();
            $table->foreign('articlePresse_id')->references('id')->on('articlePresses')->onDelete("cascade");
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
        Schema::dropIfExists('articlePresse_edition');
    }
}
