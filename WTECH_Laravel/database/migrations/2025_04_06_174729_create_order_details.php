<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigInteger('payment_details_card_number');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_price', 3, 2)->nullable();
            $table->unsignedBigInteger('shipping_details_id')->nullable();
        
            $table->foreign('payment_details_card_number')->references('card_number')->on('payment_details');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('shipping_details_id')->references('id')->on('shipping_details');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
