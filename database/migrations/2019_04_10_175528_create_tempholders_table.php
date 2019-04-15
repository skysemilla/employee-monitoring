<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempholders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('newcat_id')->nullable();
            $table->integer('oldcat_id')->nullable();
            $table->integer('newprojname_id')->nullable();
            $table->integer('oldprojname_id')->nullable();

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
        Schema::dropIfExists('tempholders');
    }
}
