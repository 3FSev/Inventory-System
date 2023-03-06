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
        Schema::create('item_wiv', function (Blueprint $table) {
            $table->foreignId('item_id')->constrained();
            $table->unsignedBigInteger('wiv_id');
            $table->foreign('wiv_id')->references('id')->on('wiv')->onDelete('cascade');
            $table->unsignedInteger('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_wiv');
    }
};
