<?php

namespace App\Filament\Resources\TipeMobils\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TipeMobilsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode Tipe Mobil')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nama Tipe Mobil')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('order_no')
                    ->label('Urutan')
                    ->searchable()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
