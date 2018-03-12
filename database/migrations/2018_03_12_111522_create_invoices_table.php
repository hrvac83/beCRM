<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->integer('company_id');
            $table->integer('user_id');
            $table->string('invoice_num');
            $table->string('buyer_name');
            $table->string('buyer_address');
            $table->string('buyer_oib');
            $table->string('seller_name');
            $table->string('seller_address');
            $table->string('seller_oib');
            $table->string('payment_option');
            $table->string('additional_option');
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
        Schema::dropIfExists('invoices');
    }
}
