<?php

namespace App\Filament\Resources\Warrenties\Pages;

use App\Filament\Resources\Warrenties\WarrentyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWarrenties extends ListRecords
{
    protected static string $resource = WarrentyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
