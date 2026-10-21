<?php

namespace App\Filament\Resources\FilmSeris\Pages;

use App\Filament\Resources\FilmSeris\FilmSeriResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFilmSeris extends ListRecords
{
    protected static string $resource = FilmSeriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
