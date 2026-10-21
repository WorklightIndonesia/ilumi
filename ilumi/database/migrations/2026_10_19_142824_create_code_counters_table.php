<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('code_counters', function (Blueprint $table) {
            $table->string('name', 50)->primary();
            $table->unsignedBigInteger('last_number')->default(0);
        });

        $lastNumber = DB::table('faq')
            ->where('kode', 'like', 'FAQ%')
            ->pluck('kode')
            ->map(function ($kode) {
                return preg_match('/^FAQ(\d+)$/', $kode, $matches)
                    ? (int) $matches[1]
                    : 0;
            })
            ->max() ?? 0;

        DB::table('code_counters')->insert([
            'name' => 'faq',
            'last_number' => $lastNumber,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_counters');
    }
};
