<?php

namespace App\Filament\Resources\TipeMobils\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\TipeMobil;

class TipeMobilForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('order_no')
                ->label('Urutan')
                ->options(function (?TipeMobil $record) {
                    $total = TipeMobil::count();

                    $max = $record ? $total : $total + 1;

                    return collect(range(1, max(1, $max)))
                        ->mapWithKeys(fn ($number) => [
                            $number => (string) $number,
                        ])
                        ->all();
                })
                ->unique(
                    table: 'faq',
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
                ->label('Nama Tipe Mobil')
                ->required()
                ->maxLength(255),
        ]);

    }
}
