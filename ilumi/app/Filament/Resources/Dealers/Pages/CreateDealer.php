<?php

namespace App\Filament\Resources\Dealers\Pages;

use App\Filament\Resources\Dealers\DealerResource;
use App\Models\Dealer;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateDealer extends CreateRecord
{
    protected static string $resource = DealerResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $counter = DB::table('code_counters')
                ->where('name', 'dealer')
                ->lockForUpdate()
                ->first();

            if (! $counter) {
                throw new \RuntimeException(
                    'Counter dealer belum tersedia di code_counters.'
                );
            }

            $nextNumber = $counter->last_number + 1;

            DB::table('code_counters')
                ->where('name', 'dealer')
                ->update(['last_number' => $nextNumber]);

            $data['kode'] = 'DLR' . str_pad(
                (string) $nextNumber,
                3,
                '0',
                STR_PAD_LEFT
            );

            $data['created_by'] = auth()->user()?->name ?? 'admin';
            $data['created_date'] = now();

            return Dealer::create($data);
        });
    }
}
