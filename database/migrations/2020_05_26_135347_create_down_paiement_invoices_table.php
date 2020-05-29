<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownPaiementInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('down_paiement_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->string('title');
            $table->integer('amount')->unsigned();
            $table->boolean('paid')->default(false);
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
        Schema::dropIfExists('down_paiement_invoices');
    }
}
