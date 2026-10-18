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
        Schema::create('film_seri_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kode_seri', 50);
            $table->string('product_name', 255);
            $table->string('description');
            $table->string('image')->nullable();

            // Value
            $table->integer('tser')->nullable();
            $table->integer('VLT')->nullable();
            $table->integer('black')->nullable();
            $table->integer('clear')->nullable();
            $table->integer('ir_rejection_1400')->nullable();
            $table->integer('ir_rejection_900')->nullable();
            $table->integer('uv_rejection')->nullable();

            // Category
            $table->string('privacy_level')->nullable();
            $table->string('visibilitas_malam')->nullable();
            $table->string('tolak_panas')->nullable();
            $table->string('category')->nullable();

            $table->string('created_by', 100)->nullable();
            $table->timestamp('created_date')->nullable();
            $table->string('modified_by', 100)->nullable();
            $table->timestamp('modified_date')->nullable();

            $table->foreign('kode_seri')
                ->references('kode')
                ->on('film_seri')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_seri_detail');
    }
};
