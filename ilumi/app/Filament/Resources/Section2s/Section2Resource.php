<?php

namespace App\Filament\Resources\Section2s;

use App\Filament\Resources\Section2s\Pages\CreateSection2;
use App\Filament\Resources\Section2s\Pages\EditSection2;
use App\Filament\Resources\Section2s\Pages\ListSection2s;
use App\Filament\Resources\Section2s\Pages\ManageSection2;
use App\Filament\Resources\Section2s\Schemas\Section2Form;
use App\Filament\Resources\Section2s\Tables\Section2sTable;
use App\Models\Section2;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class Section2Resource extends Resource
{
     static string|\UnitEnum|null $navigationGroup = 'Konten Web';
    protected static ?string $model = Section2::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'Section2';

    protected static ?string $navigationLabel = 'Section 2';

    protected static ?string $modelLabel = 'Section 2';

    protected static ?string $pluralModelLabel = 'Section 2';

    protected static ?string $slug = 'umum/section-2';

    public static function getNavigationUrl(): string
    {
        $record = Section2::query()
            ->orderBy('created_date', 'asc')
            ->orderBy('id', 'asc')
            ->first();

        if ($record) {
            return static::getUrl('edit', [
                'record' => $record,
            ]);
        }

        return static::getUrl('create');
    }

    public static function form(Schema $schema): Schema
    {
        return Section2Form::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return Section2sTable::configure($table);
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
            'index' => CreateSection2::route('/'),
            'create' => CreateSection2::route('/create'),
            'edit' => EditSection2::route('/{record}/edit'),
        ];
    }
}
