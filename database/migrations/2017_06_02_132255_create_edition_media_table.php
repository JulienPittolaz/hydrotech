<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id')->unsigned();
            $table->integer('edition_id')->unsigned();
            $table->timestamps();
            $table->foreign('media_id')->references('id')->on('medias')->onDelete("cascade");
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
        Schema::dropIfExists('edition_media');
    }
}
