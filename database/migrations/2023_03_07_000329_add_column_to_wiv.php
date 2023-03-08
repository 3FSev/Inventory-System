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
            $table->integer('riv');
            $table->timestamp('riv_date')->nullable();
            $table->integer('po');
            $table->timestamp('po_date')->nullable();
            $table->integer('rr');
            $table->timestamp('rr_date')->nullable();
            $table->timestamp('received_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wiv', function (Blueprint $table) {
            $table->dropColumn('riv');
            $table->dropColumn('riv_date');
            $table->dropColumn('po');
            $table->dropColumn('po_date');
            $table->dropColumn('rr');
            $table->dropColumn('rr_date');
        });
    }
};
