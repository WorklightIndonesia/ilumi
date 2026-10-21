<?php

namespace App\Filament\Resources\TipeMobils\Pages;

use App\Filament\Resources\TipeMobils\TipeMobilResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTipeMobil extends EditRecord
{
    protected static string $resource = TipeMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
