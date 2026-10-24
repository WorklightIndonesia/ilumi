<?php

namespace App\Filament\Resources\TipeMobils;

use App\Filament\Resources\TipeMobils\Pages\CreateTipeMobil;
use App\Filament\Resources\TipeMobils\Pages\EditTipeMobil;
use App\Filament\Resources\TipeMobils\Pages\ListTipeMobils;
use App\Filament\Resources\TipeMobils\Schemas\TipeMobilForm;
use App\Filament\Resources\TipeMobils\Tables\TipeMobilsTable;
use App\Models\TipeMobil;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TipeMobilResource extends Resource
{
    protected static ?string $model = TipeMobil::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'tipe_mobil';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'Tipe Mobil';

    protected static ?string $modelLabel = 'Tipe Mobil';

    protected static ?string $pluralModelLabel = 'Tipe Mobil';

    protected static ?string $slug = 'tipe-mobil';

    public static function canViewAny(): bool
    {
        return false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false;
    }

    public static function canDelete(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return false;
    }


    public static function form(Schema $schema): Schema
    {
        return TipeMobilForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TipeMobilsTable::configure($table);
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
            'index' => ListTipeMobils::route('/'),
            'create' => CreateTipeMobil::route('/create'),
            'edit' => EditTipeMobil::route('/{record}/edit'),
        ];
    }
}
