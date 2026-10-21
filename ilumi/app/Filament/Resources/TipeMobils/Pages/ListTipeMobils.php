<?php

namespace App\Filament\Resources\TipeMobils\Pages;

use App\Filament\Resources\TipeMobils\TipeMobilResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTipeMobils extends ListRecords
{
    protected static string $resource = TipeMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
