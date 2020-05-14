<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NavigationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wording');
            $table->integer('position')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('parentorder')->nullable();
            $table->boolean('favorite')->nullable();
            $table->boolean('active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigations');
    }
}
