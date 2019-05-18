<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->integer('club_id')->unsigned(); // FK
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade'); 
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
        Schema::dropIfExists('club_images');
    }
}
