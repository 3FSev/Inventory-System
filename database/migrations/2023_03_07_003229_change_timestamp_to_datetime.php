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
        Schema::table('wiv', function (Blueprint $table) {
            $table->dateTime('riv_date')->nullable()->change();
            $table->dateTime('po_date')->nullable()->change();
            $table->dateTime('rr_date')->nullable()->change();
            $table->dateTime('wiv_date')->nullable()->after('rr_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wiv', function (Blueprint $table) {
            $table->timestamp('riv_date')->nullable()->change();
            $table->timestamp('po_date')->nullable()->change();
            $table->timestamp('rr_date')->nullable()->change();
            $table->timestamp('wiv_date')->nullable()->change();
        });
    }
};
