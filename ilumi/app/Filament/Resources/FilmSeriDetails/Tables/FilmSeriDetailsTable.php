<?php

namespace App\Filament\Resources\FilmSeriDetails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FilmSeriDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->square(),

                TextColumn::make('product_name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('filmSeri.name')
                    ->label('Seri Film')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tser')
                    ->label('TSER')
                    ->suffix('%')
                    ->sortable(),

                TextColumn::make('VLT')
                    ->label('VLT')
                    ->suffix('%')
                    ->sortable(),

                TextColumn::make('privacy_level')
                    ->label('Privasi')
                    ->searchable(),

                TextColumn::make('visibilitas_malam')
                    ->label('Visibilitas Malam')
                    ->searchable(),

                TextColumn::make('tolak_panas')
                    ->label('Penolakan Panas')
                    ->searchable(),
            ])
            ->defaultSort('id', 'desc')
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
