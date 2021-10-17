<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrainingTrainers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings_trainers', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('training_id');
            $table->unsignedInteger('trainer_id');

            $table->foreign('training_id')
                    ->references('id')
                    ->on('training')
                    ->onDelete('cascade');
            
            $table->foreign('trainer_id')
                    ->references('id')
                    ->on('trainer')
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
