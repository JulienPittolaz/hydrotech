<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlePressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlePresses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('url');
            $table->string('titreArticle');
            $table->text('description');
            $table->date('dateParution');
            $table->timestamps();
            $table->string('nomPresse');
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
        Schema::dropIfExists('articlePresses');
    }
}
