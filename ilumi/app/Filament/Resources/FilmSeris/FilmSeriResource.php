<?php

namespace App\Filament\Resources\FilmSeris;

use App\Filament\Resources\FilmSeris\Pages\CreateFilmSeri;
use App\Filament\Resources\FilmSeris\Pages\EditFilmSeri;
use App\Filament\Resources\FilmSeris\Pages\ListFilmSeris;
use App\Filament\Resources\FilmSeris\Schemas\FilmSeriForm;
use App\Filament\Resources\FilmSeris\Tables\FilmSerisTable;
use App\Models\FilmSeri;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FilmSeriResource extends Resource
{
    protected static ?string $model = FilmSeri::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'film_seri';


    protected static ?string $navigationLabel = 'Seri Kaca Film';

    protected static ?string $modelLabel = 'Seri Kaca Film';

    protected static ?string $pluralModelLabel = 'Seri Kaca Film';

    protected static ?string $slug = 'seri-kaca-film';


    public static function form(Schema $schema): Schema
    {
        return FilmSeriForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FilmSerisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFilmSeris::route('/'),
            'create' => CreateFilmSeri::route('/create'),
            'edit' => EditFilmSeri::route('/{record}/edit'),
        ];
    }
}
