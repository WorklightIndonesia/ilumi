<?php

namespace App\Filament\Resources\Warrenties;

use App\Filament\Resources\Warrenties\Pages\CreateWarrenty;
use App\Filament\Resources\Warrenties\Pages\EditWarrenty;
use App\Filament\Resources\Warrenties\Pages\ListWarrenties;
use App\Filament\Resources\Warrenties\Schemas\WarrentyForm;
use App\Filament\Resources\Warrenties\Tables\WarrentiesTable;
use App\Models\Warrenty;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WarrentyResource extends Resource
{
    protected static ?string $model = Warrenty::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'E-Warranty';

    protected static ?string $navigationLabel = 'E-Warranty';

    protected static ?string $modelLabel = 'E-Warranty';

    protected static ?string $pluralModelLabel = 'E-Warranty';

    protected static ?string $slug = 'e-warranty';


    public static function form(Schema $schema): Schema
    {
        return WarrentyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WarrentiesTable::configure($table);
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
            'index' => ListWarrenties::route('/'),
            'create' => CreateWarrenty::route('/create'),
            'edit' => EditWarrenty::route('/{record}/edit'),
        ];
    }
}
