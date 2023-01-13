<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('number');
            $table->unsignedInteger('amount');
            $table->float('netto_price');
            $table->float('value', 8, 6, true);
            $table->date('invoice_date');
            $table->date('sell_date');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('companies');
            $table->foreign('buyer_id')->references('id')->on('companies');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
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
};
