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
        Schema::table('item_wiv', function (Blueprint $table) {
            $table->string('unit');
            $table->string('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_wiv', function (Blueprint $table) {
            $table->dropColumn('unit');
            $table->dropColumn('amount');
        });
    }
};
