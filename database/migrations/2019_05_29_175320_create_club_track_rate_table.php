<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubTrackRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_track_rate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('club_track_id')->unsigned();
            $table->foreign('club_track_id')->references('id')->on('club_tracks')->onDelete('cascade'); 
            $table->integer('rate_id')->unsigned();
            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade'); 
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
        Schema::dropIfExists('club_track_rate');
    }
}
