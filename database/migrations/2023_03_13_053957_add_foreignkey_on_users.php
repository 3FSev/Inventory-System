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
        Schema::table('users', function (Blueprint $table) {
            //Role foreign key
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');

            //Role foreign key
            $table->unsignedBigInteger('dept_id');
            $table->foreign('dept_id')->references('id')->on('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['role_id']);
            $table->dropForeign(['dept_id']);

            // Drop columns
            $table->dropColumn('role_id');
            $table->dropColumn('dept_id');
        });
    }
};
