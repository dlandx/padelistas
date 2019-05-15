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
            $table->string('name');
            $table->string('type',50);
            $table->string('enclosure',50)->nullable(); // cerramiento interior/exterior/cubierta
            $table->string('walls',50)->nullable();
            $table->string('size',50)->nullable();
            $table->text('description')->nullable();

            $table->integer('club_id')->unsigned(); // FK 
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade'); 
            $table->integer('type_surface_id')->unsigned()->nullable();         
            $table->foreign('type_surface_id')->references('id')->on('type_surfaces')->onDelete('set null');          
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
