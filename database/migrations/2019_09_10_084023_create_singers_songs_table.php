<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingersSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singers_songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('singer_id')->unsigned();
            $table->foreign('singer_id')->references('id')->on('songs');
            $table->bigInteger('song_id')->unsigned();
            $table->foreign('song_id')->references('id')->on('singers');
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
        Schema::dropIfExists('singers_songs');
    }
}
