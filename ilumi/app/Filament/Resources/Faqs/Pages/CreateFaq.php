<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqResource;
use Filament\Resources\Pages\CreateRecord;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateFaq extends CreateRecord
{
    protected static string $resource = FaqResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $counter = DB::table('code_counters')
                ->where('name', 'faq')
                ->lockForUpdate()
                ->first();

            if (!$counter) {
                throw new \RuntimeException(
                    'Counter FAQ belum tersedia di tabel code_counters.'
                );
            }

            $nextNumber = $counter->last_number + 1;

            DB::table('code_counters')
                ->where('name', 'faq')
                ->update([
                    'last_number' => $nextNumber,
                ]);

            $data['kode'] = 'FAQ' . str_pad(
                (string) $nextNumber,
                3,
                '0',
                STR_PAD_LEFT
            );

            $data['created_by'] = auth()->user()?->name ?? 'admin';
            $data['created_date'] = now();

            return Faq::create($data);
        });
    }
}
