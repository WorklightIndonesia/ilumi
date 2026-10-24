<?php

namespace App\Filament\Resources\Warrenties\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WarrentiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ewarrenty_no')
                    ->label('E-Warranty No')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('dealer.name')
                    ->label('Dealer')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tipe_mobil')
                    ->label('Tipe Mobil')
                    ->searchable(),

                TextColumn::make('nomor_polisi')
                    ->label('Nomor Polisi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('front_film')
                    ->label('Front Film')
                    ->placeholder('-'),

                TextColumn::make('back_film')
                    ->label('Back Film')
                    ->placeholder('-'),

                TextColumn::make('created_date')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_date', 'desc')
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
