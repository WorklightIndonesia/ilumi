<?php

namespace App\Filament\Resources\TipeMobils\Pages;

use App\Filament\Resources\TipeMobils\TipeMobilResource;
use App\Models\TipeMobil;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateTipeMobil extends CreateRecord
{
    protected static string $resource = TipeMobilResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $counter = DB::table('code_counters')
                ->where('name', 'tipe_mobil')
                ->lockForUpdate()
                ->first();

            if (!$counter) {
                throw new \RuntimeException(
                    'Counter tipe_mobil belum tersedia.'
                );
            }

            $nextNumber = $counter->last_number + 1;

            DB::table('code_counters')
                ->where('name', 'tipe_mobil')
                ->update(['last_number' => $nextNumber]);

            $data['kode'] = 'TM' . str_pad(
                (string) $nextNumber,
                3,
                '0',
                STR_PAD_LEFT
            );

            return TipeMobil::create($data);
        });
    }
}
