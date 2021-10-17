<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrainingClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings_clients', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('training_id');
            $table->unsignedInteger('client_id');

            $table->foreign('training_id')
                    ->references('id')
                    ->on('training')
                    ->onDelete('cascade');
            
            $table->foreign('client_id')
                    ->references('id')
                    ->on('client')
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
