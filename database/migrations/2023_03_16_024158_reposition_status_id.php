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
        Schema::table('item_mrt', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->after('item_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_mrt', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->change();
        });
    }
};
