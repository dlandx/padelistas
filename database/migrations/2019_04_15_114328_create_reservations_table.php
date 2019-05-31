<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->char('color',7)->nullable();
            $table->time('duration');
            $table->float('price',8,2);
            $table->integer('players');
            $table->boolean('full');
            $table->integer('search_players')->nullable();
            $table->integer('club_track_id')->unsigned(); // FK
            $table->foreign('club_track_id')->references('id')->on('club_tracks')->onDelete('cascade');
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
        Schema::dropIfExists('reservations');
    }
}
