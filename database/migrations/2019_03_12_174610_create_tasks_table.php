<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('header_id')->default('0');
            $table->string('title');
            $table->string('category_id');
            $table->integer('target_no');
            $table->integer('actual_no')->nullable();
            $table->integer('rating_quantity')->nullable();
            $table->integer('rating_timeliness')->nullable();
            $table->integer('rating_effort')->nullable();
            $table->integer('rating_average')->nullable();

            $table->string('remarks')->nullable();
            $table->integer('report_id');
            $table->integer('user_id');

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
        Schema::dropIfExists('tasks');
    }
}
