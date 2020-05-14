<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('lastname', 150);
            $table->string('email', 255)->unique();
            $table->string('phone');
            $table->string('slug', 255)->unique();
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')

                ->onDelete('cascade');
        });

        DB::statement('ALTER TABLE contacts CHANGE phone phone INT(10) ZEROFILL NOT NULL ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
