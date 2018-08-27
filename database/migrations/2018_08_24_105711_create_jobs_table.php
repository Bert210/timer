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
            $table->increments('id');

            $table->integer("status_id");
            $table->integer("type_id");
            // $table->foreign("type_id")->references('id')->on('types');
            $table->integer("employee_id");

            $table->bigInteger("created_at_ms");
            $table->bigInteger("queue")->nullable();
            $table->bigInteger("processing")->nullable();

            $table->integer("queue_time")->nullable();
            $table->integer("processing_time")->nullable();
            $table->integer("total_time")->nullable();

            $table->string("stock_tag_number");
            $table->boolean("vip")->default(false);

            // $table->timestampsTz();
            $table->timestampTz("created_at_timezone")->useCurrent();


            $table->timestampsTz();
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
