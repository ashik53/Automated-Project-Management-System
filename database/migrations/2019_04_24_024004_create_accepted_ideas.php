<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptedIdeas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_ideas', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->bigInteger('idea_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            
            $table->foreign('user_id')->references('id')->on('users')->unsigned();
            $table->foreign('idea_id')->references('id')->on('ideas')->unsigned();
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
        Schema::dropIfExists('accepted_ideas');
    }
}
