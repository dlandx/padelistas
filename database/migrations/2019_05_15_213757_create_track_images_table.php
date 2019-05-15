<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();

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
        Schema::dropIfExists('track_images');
    }
}
