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
        Schema::create('item_mrt', function (Blueprint $table) {
            //Mrt foreign key
            $table->unsignedBigInteger('mrt_id');
            $table->foreign('mrt_id')->references('id')->on('mrt');

            //Item foreign key
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_mrt');
    }
};
