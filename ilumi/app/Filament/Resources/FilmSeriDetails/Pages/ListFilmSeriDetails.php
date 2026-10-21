<?php

namespace App\Filament\Resources\FilmSeriDetails\Pages;

use App\Filament\Resources\FilmSeriDetails\FilmSeriDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFilmSeriDetails extends ListRecords
{
    protected static string $resource = FilmSeriDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
