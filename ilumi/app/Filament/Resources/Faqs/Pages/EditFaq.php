<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditFaq extends EditRecord
{
    protected static string $resource = FaqResource::class;

    protected function handleRecordUpdate(
        Model $record,
        array $data
    ): Model {
        $record->update([
            'order_no' => $data['order_no'] ?? null,
            'question' => $data['question'],
            'answer' => $data['answer'],
            'modified_by' => auth()->user()?->name ?? 'admin',
            'modified_date' => now(),
        ]);

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
