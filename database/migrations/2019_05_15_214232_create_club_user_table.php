<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_user', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('following');
            $table->boolean('delete')->nullable(); // Darse de baja
            $table->integer('club_id')->unsigned()->index();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('club_user');
    }
}
