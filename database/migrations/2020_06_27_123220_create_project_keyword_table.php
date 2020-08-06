<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_keyword', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->integer('keyword_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('keyword_id')->references('id')->on('keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_keyword');
    }
}
