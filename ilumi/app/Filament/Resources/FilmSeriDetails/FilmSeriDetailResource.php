<?php

namespace App\Filament\Resources\FilmSeriDetails;

use App\Filament\Resources\FilmSeriDetails\Pages\CreateFilmSeriDetail;
use App\Filament\Resources\FilmSeriDetails\Pages\EditFilmSeriDetail;
use App\Filament\Resources\FilmSeriDetails\Pages\ListFilmSeriDetails;
use App\Filament\Resources\FilmSeriDetails\Schemas\FilmSeriDetailForm;
use App\Filament\Resources\FilmSeriDetails\Tables\FilmSeriDetailsTable;
use App\Models\FilmSeriDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FilmSeriDetailResource extends Resource
{
    protected static ?string $model = FilmSeriDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'film_seri_detail';


    protected static ?string $navigationLabel = 'Produk Kaca Film';

    protected static ?string $modelLabel = 'Produk Kaca Film';

    protected static ?string $pluralModelLabel = 'Produk Kaca Film';

    protected static ?string $slug = 'produk-kaca-film';


    public static function form(Schema $schema): Schema
    {
        return FilmSeriDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FilmSeriDetailsTable::configure($table);
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
            'index' => ListFilmSeriDetails::route('/'),
            'create' => CreateFilmSeriDetail::route('/create'),
            'edit' => EditFilmSeriDetail::route('/{record}/edit'),
        ];
    }
}
