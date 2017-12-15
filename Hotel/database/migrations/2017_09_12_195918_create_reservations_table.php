<?php

use Illuminate\Support\Facades\DB;
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
            $table->string('reservation_num');
            $table->timestamp('date_reservation');
            $table->date('date_check_in');
            $table->date('date_check_out');
            $table->string('observation', 100)->nullable();
            $table->integer('state');
            $table->integer('id_person')->unsigned();
            $table->foreign('id_person')->references('id')->on('person');
            $table->integer('id_inc_exp')->unsigned()->nullable();
            $table->foreign('id_inc_exp')->references('id')->on('income_expenses')->nullable();
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
