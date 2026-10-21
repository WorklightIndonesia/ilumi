<?php

namespace App\Filament\Resources\FilmSeris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\FilmSeri;

class FilmSeriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('order_no')
                ->label('Urutan')
                ->options(function (?FilmSeri $record) {
                    $total = FilmSeri::count();

                    $max = $record ? $total : $total + 1;

                    return collect(range(1, max(1, $max)))
                        ->mapWithKeys(fn ($number) => [
                            $number => (string) $number,
                        ])
                        ->all();
                })
                ->unique(
                    table: 'film_seri',
                    column: 'order_no',
                    ignoreRecord: true,
                )
                ->validationMessages([
                    'unique' => 'Nomor urutan ini sudah digunakan. Silakan pilih nomor lain.',
                ])
                ->required()
                ->native(false)
                ->placeholder('Pilih urutan'),

            TextInput::make('name')
                ->label('Nama Film Seri')
                ->required()
                ->maxLength(255),
            ]);
    }
}
