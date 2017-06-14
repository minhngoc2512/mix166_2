<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->string('path_image_video');
            $table->integer('category_id')->unsigned();
            $table->integer('artist_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('status')->default(0);
            $table->string('type');
            $table->timestamps();
            $table->integer('count_view')->default(0);

        });
        Schema::table('files',function(Blueprint $table){
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
        //
    }
}
