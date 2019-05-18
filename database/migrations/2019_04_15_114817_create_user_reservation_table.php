<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->boolean('pay');
            $table->integer('user_id')->unsigned(); //->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('reservation_id')->unsigned(); //->index();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            //$table->primary(array('user_id', 'reservation_id'));
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
        Schema::dropIfExists('user_reservation');
    }
}
