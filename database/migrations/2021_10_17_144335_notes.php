<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('trainer_id');
            $table->unsignedInteger('training_id');
            $table->date('note_date');
            $table->foreign('client_id')
                    ->references('id')
                    ->on('client')
                    ->onDelete('cascade');

            $table->foreign('trainer_id')
                    ->references('id')
                    ->on('trainer')
                    ->onDelete('cascade');

            $table->foreign('training_id')
                    ->references('id')
                    ->on('training')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
