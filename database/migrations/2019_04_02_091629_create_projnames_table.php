<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projnames', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('report_id');
            $table->integer('user_id');
            /*$table->integer('category_id');*/
            $table->integer('rowCount')->nullable();
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
        Schema::dropIfExists('projname');
    }
}
