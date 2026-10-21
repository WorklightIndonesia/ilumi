<?php

namespace App\Filament\Resources\FilmSeris\Pages;

use App\Filament\Resources\FilmSeris\FilmSeriResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFilmSeri extends EditRecord
{
    protected static string $resource = FilmSeriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
