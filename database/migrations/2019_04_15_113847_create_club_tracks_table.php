<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->text('description')->nullable();
            $table->float('price_1',8,2)->nullable();
            $table->float('price_2',8,2)->nullable();
            $table->float('price_3',8,2)->nullable();

            $table->integer('club_id')->unsigned(); // FK
            $table->foreign('club_id')->references('id')->on('clubs');
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
        Schema::dropIfExists('club_tracks');
    }
}
