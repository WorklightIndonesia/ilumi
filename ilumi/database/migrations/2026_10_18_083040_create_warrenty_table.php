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
        Schema::create('warrenty', function (Blueprint $table) {
            $table->string('ewarrenty_no', 100)->primary();

            $table->string('dealer_code', 50);
            $table->string('tipe_mobil', 50);
            $table->string('nomor_polisi', 20);

            $table->string('front_film', 100)->nullable();
            $table->string('side_film1', 100)->nullable();
            $table->string('side_film2', 100)->nullable();
            $table->string('side_film3', 100)->nullable();
            $table->string('back_film', 100)->nullable();
            $table->string('sunroof_film', 100)->nullable();

            $table->string('created_by', 100)->nullable();
            $table->timestamp('created_date')->nullable();
            $table->string('modified_by', 100)->nullable();
            $table->timestamp('modified_date')->nullable();

            $table->foreign('dealer_code')
                ->references('kode')
                ->on('dealer')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('tipe_mobil')
                ->references('kode')
                ->on('tipe_mobil')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->index('nomor_polisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warrenty');
    }
};
