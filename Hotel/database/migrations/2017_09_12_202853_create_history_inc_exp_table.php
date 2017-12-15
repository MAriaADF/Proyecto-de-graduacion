<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryIncExpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_inc_exp', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date');
            $table->float('sum');
            $table->string('action_type');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_inc_exp')->unsigned();
            $table->foreign('id_inc_exp')->references('id')->on('income_expenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_inc_exp');
    }
}
