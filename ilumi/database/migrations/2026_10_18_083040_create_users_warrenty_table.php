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
        Schema::create('users_warrenty', function (Blueprint $table) {
             $table->id();

            $table->string('name', 255);
            $table->string('ewarrenty', 100);

            $table->string('status', 50)->default('pending');
            $table->string('email', 255)->nullable();
            $table->string('whatsapp_no', 30)->nullable();
            $table->text('comment')->nullable();

            $table->string('created_by', 100)->nullable();
            $table->timestamp('created_date')->nullable();
            $table->string('modified_by', 100)->nullable();
            $table->timestamp('modified_date')->nullable();

            $table->foreign('ewarrenty')
                ->references('ewarrenty_no')
                ->on('warrenty')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->index('email');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_warrenty');
    }
};
