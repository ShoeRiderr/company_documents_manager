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
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('month_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('city_id');
            $table->tinyInteger('is_income');
            $table->string('city');
            $table->string('number');
            $table->unsignedBigInteger('price_netto');
            $table->unsignedBigInteger('price_brutto');
            $table->unsignedBigInteger('vat_amount');
            $table->date('invoice_date');
            $table->date('sell_date');
            $table->timestamps();

            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('month_id')->references('id')->on('months');
            $table->foreign('seller_id')->references('id')->on('companies');
            $table->foreign('buyer_id')->references('id')->on('companies');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('city_id')->references('id')->on('cities');
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
