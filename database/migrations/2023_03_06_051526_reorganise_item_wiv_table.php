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
            $table->unsignedBigInteger('wiv_id')->first()->change();
            $table->unsignedBigInteger('item_id')->after('wiv_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_wiv', function (Blueprint $table) {
            //
        });
    }
};
