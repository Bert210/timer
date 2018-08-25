<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            /*
                id
                Start Date and Time
                Time in Queue
                Status (Completed, processing, queued)
                Time to Finish
                *Total Time
                Stock / Tag #
                type_id
            */
            $table->increments('id');

            $table->integer("status_id");
            $table->integer("type_id");
            $table->integer("employee_id");

            $table->dateTime("queue")->nullable();
            $table->dateTime("processing")->nullable();

            $table->string("stock_tag_number");


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
        Schema::dropIfExists('jobs');
    }
}
