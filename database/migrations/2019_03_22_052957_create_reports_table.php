<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duration');
            $table->string('year');
            $table->boolean('forApproval')->nullable();
            $table->boolean('approved')->nullable();
            $table->integer('user_id');
            $table->text('comment')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->integer('total_average')->nullable();
            $table->boolean('forAssessment')->nullable();
            $table->boolean('assessed')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
