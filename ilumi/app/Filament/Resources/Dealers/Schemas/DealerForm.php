<?php

namespace App\Filament\Resources\Dealers\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DealerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('name')
                ->label('Nama Dealer')
                ->required()
                ->maxLength(255),

            TextInput::make('city')
                ->label('Kota')
                ->required()
                ->maxLength(255),

            Textarea::make('alamat')
                ->label('Alamat')
                ->required()
                ->columnSpanFull(),

            TextInput::make('opening_hours')
                ->label('Jam Buka')
                ->placeholder('Contoh: Senin–Sabtu, 09.00–17.00')
                ->required()
                ->maxLength(255),

            TextInput::make('whatsappno')
                ->label('Nomor Whatsapp')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('maps')
                ->label('Link Google Maps')
                ->url()
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),
            ]);
    }
}
