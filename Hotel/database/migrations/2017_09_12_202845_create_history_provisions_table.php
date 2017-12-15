<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryProvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_provisions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('quantity');
            $table->timestamp('date');
            $table->boolean('type');
            $table->string('action_type');
            $table->integer('id_provision')->unsigned();
            $table->foreign('id_provision')->references('id')->on('provisions');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('history_provisions');
    }
}
