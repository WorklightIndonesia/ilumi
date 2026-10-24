<?php

namespace App\Filament\Resources\Section2s\Pages;

use App\Filament\Resources\Section2s\Section2Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSection2s extends ListRecords
{
    protected static string $resource = Section2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
