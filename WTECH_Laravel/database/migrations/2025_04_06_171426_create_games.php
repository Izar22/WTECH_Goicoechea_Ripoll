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
        Schema::create('games', function (Blueprint $table) {
            $table->id(); // GameID
            $table->string('title', 50);
            $table->date('release_date');
            $table->string('publisher_name', 50);
            $table->decimal('price', 3, 2);
            $table->string('platform', 50);
            $table->string('region', 50);
            $table->string('genre', 50);
            $table->string('description', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
