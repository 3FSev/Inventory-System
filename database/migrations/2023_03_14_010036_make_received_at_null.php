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
            $table->timestamp('received_at')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wiv', function (Blueprint $table) {
            $table->timestamp('received_at')->default(DB::raw('CURRENT_TIMESTAMP()'))->change();

        });
    }
};
