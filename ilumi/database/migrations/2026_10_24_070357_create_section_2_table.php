<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section_2', function (Blueprint $table) {
            $table->id();

            $table->string('image', 255)->nullable();
            $table->string('heading_1', 255);
            $table->text('description')->nullable();
            $table->string('cta_text', 100)->nullable();

            $table->string('created_by', 100)->nullable();
            $table->timestamp('created_date')->nullable();
            $table->string('modified_by', 100)->nullable();
            $table->timestamp('modified_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_2');
    }
};
