<?php

namespace App\Filament\Resources\FilmSeris\Pages;


use App\Filament\Resources\FilmSeris\FilmSeriResource;
use App\Models\FilmSeri;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class CreateFilmSeri extends CreateRecord
{
    protected static string $resource = FilmSeriResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $counter = DB::table('code_counters')
                ->where('name', 'film_seri')
                ->lockForUpdate()
                ->first();

            if (! $counter) {
                throw new \RuntimeException(
                    'Counter film_seri belum tersedia.'
                );
            }

            $nextNumber = $counter->last_number + 1;

            DB::table('code_counters')
                ->where('name', 'film_seri')
                ->update(['last_number' => $nextNumber]);

            $data['kode'] = 'FS' . str_pad(
                (string) $nextNumber,
                3,
                '0',
                STR_PAD_LEFT
            );

            return FilmSeri::create($data);
        });
    }
}
