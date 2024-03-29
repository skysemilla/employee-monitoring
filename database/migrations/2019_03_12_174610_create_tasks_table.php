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
            $table->integer('category_id');
            $table->string('target_no');
            $table->string('actual_no')->nullable();
            $table->float('rating_quantity')->nullable();
            $table->float('rating_timeliness')->nullable();
            $table->float('rating_effort')->nullable();
            $table->float('rating_average')->nullable();

            $table->string('remarks')->nullable();
            $table->integer('report_id');
            $table->integer('user_id');
            $table->integer('projname_id')->nullable();

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
