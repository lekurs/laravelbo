<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableFieldsClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
//            $table->string('address', 255);
//            $table->integer('zip');
//            $table->string('city');
//            $table->string('siren');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('address', 255);
            $table->integer('zip');
            $table->string('city');
            $table->string('siren');
        });
    }
}
