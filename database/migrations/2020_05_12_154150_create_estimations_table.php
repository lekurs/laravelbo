<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('title', '255');
            $table->text('body');
            $table->decimal('price', 6, 2);
            $table->integer('client_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')
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
        Schema::dropIfExists('estimations');
    }
}
