<?php

namespace App\Filament\Resources\Section2s\Pages;

use App\Filament\Resources\Section2s\Section2Resource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSection2 extends EditRecord
{
    protected static string $resource = Section2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
