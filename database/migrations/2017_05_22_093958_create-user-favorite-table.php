<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user-favorite',function(Blueprint $table){
            $table->increments('id');
            $table->softDeletes();
            $table->integer('user_id')->unsigned();
            $table->integer('file_id')->unsigned();

        });
        Schema::table('user-favorite',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('file_id')->references('id')->on('files');
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
        Schema::dropIfExists('user-favorite');
        //
    }
}
