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
            $table->integer('riv')->nullable()->change();
            $table->date('riv_date')->nullable()->change();

            $table->integer('po')->nullable()->change();
            $table->date('po_date')->nullable()->change();

            $table->integer('rr')->nullable()->change();
            $table->date('rr_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wiv', function (Blueprint $table) {
            $table->integer('riv')->nullable(false)->change();
            $table->date('riv_date')->nullable(false)->change();

            $table->integer('po')->nullable(false)->change();
            $table->date('po_date')->nullable(false)->change();

            $table->integer('rr')->nullable(false)->change();
            $table->date('rr_date')->nullable(false)->change();
        });
    }
};
