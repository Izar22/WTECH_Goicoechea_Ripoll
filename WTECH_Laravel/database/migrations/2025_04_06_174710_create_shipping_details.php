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
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->string('phone', 255);
            $table->string('address', 255);
            $table->string('city', 50);
            $table->string('region', 50);
            $table->string('country', 50);
            $table->string('zipcode', 5);
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};
