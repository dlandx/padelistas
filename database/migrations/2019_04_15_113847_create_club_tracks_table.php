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
            $table->string('title'); // name -> event fullcalendar...
            $table->integer('track_type_id')->unsigned()->nullable();  
            $table->foreign('track_type_id')->references('id')->on('track_types')->onDelete('set null');
            $table->integer('type_surface_id')->unsigned()->nullable();   
            $table->foreign('type_surface_id')->references('id')->on('track_types')->onDelete('set null');      
            $table->integer('enclosure_type_id')->unsigned()->nullable(); // cerramiento interior/exterior/cubierta
            $table->foreign('enclosure_type_id')->references('id')->on('enclosure_types')->onDelete('set null');
            $table->integer('wall_id')->unsigned()->nullable();
            $table->foreign('wall_id')->references('id')->on('walls')->onDelete('set null');
            $table->integer('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('set null');
            $table->text('description')->nullable();          
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
        Schema::dropIfExists('club_tracks');
    }
}
