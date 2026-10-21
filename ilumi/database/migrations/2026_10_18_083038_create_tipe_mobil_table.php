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
        Schema::create('tipe_mobil', function (Blueprint $table) {
            $table->string('kode', 50)->primary();
            $table->string('name', 255);
            $table->integer('order_no');

            $table->string('created_by', 100)->nullable();
            $table->timestamp('created_date')->nullable();
            $table->string('modified_by', 100)->nullable();
            $table->timestamp('modified_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_mobil');
    }
};
