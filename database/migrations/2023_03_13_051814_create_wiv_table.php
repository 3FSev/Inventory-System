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
        Schema::create('wiv', function (Blueprint $table) {
            $table->id();
            //User foreign key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->integer('jv');
            $table->date('jv_date');

            $table->integer('riv');
            $table->date('riv_date');

            $table->integer('po');
            $table->date('po_date');

            $table->integer('rr');
            $table->date('rr_date');

            $table->date('wiv_date');
            $table->timestamp('received_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wiv');
    }
};
