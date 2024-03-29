<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('song_id')->unsigned()->nullable();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->bigInteger('playlist_id')->unsigned()->nullable();
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->bigInteger('singer_id')->unsigned()->nullable();
            $table->foreign('singer_id')->references('id')->on('singers')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
