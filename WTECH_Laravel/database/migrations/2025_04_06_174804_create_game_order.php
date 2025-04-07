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
        Schema::create('game_order', function (Blueprint $table) {
            $table->bigInteger('payment_details_card_number');
            $table->unsignedBigInteger('game_id');
            $table->unsignedInteger('quantity');
            $table->decimal('price', 3, 2);
        
            $table->foreign('payment_details_card_number')->references('card_number')->on('payment_details');
            $table->foreign('game_id')->references('id')->on('games');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_order');
    }
};
