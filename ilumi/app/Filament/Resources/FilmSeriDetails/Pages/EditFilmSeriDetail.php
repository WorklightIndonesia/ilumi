<?php

namespace App\Filament\Resources\FilmSeriDetails\Pages;

use App\Filament\Resources\FilmSeriDetails\FilmSeriDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFilmSeriDetail extends EditRecord
{
    protected static string $resource = FilmSeriDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
