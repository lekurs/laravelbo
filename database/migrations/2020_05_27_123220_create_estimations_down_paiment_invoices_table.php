<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationsDownPaimentInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('down_paiement_invoice_estimation', function (Blueprint $table) {
            $table->integer('estimation_id')->unsigned();
            $table->integer('down_paiement_invoice_id')->unsigned();
            $table->foreign('estimation_id')->references('id')->on('estimations')
                ->onDelete('cascade');
            $table->foreign('down_paiement_invoice_id', 'dpie_id')->references('id')->on('down_paiement_invoices')
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
        Schema::dropIfExists('estimations_down_paiment_invoices');
    }
}
