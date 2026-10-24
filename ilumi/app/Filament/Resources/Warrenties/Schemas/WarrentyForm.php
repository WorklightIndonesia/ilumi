<?php

namespace App\Filament\Resources\Warrenties\Schemas;

use App\Models\Dealer;
use App\Models\FilmSeriDetail;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WarrentyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Data Garansi')
                ->schema([
                    TextInput::make('ewarrenty_no')
                        ->label('No E-Warranty')
                        ->required()
                        ->length(6)
                        ->regex('/^[0-9]{6}$/')
                        ->unique(
                            table: 'warrenty',
                            column: 'ewarrenty_no',
                            ignoreRecord: true,
                        )
                        ->disabledOn('edit'),

                    Select::make('dealer_code')
                        ->label('Nama Dealer')
                        ->options(
                            Dealer::query()
                                ->orderBy('name')
                                ->get()
                                ->mapWithKeys(fn ($dealer) => [
                                    $dealer->kode => "{$dealer->name} - {$dealer->city}",
                                ])
                                ->all()
                        )
                        ->searchable()
                        ->preload()
                        ->required(),

                    DatePicker::make('tanggal_pemasangan')
                        ->label('Tanggal Pemasangan')
                        ->native(false)
                        ->displayFormat('d/m/Y')
                        ->nullable(),

                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'aktif' => 'Aktif',
                            'expired' => 'Expired',
                        ])
                        ->default('aktif')
                        ->required(),
                ])
                ->columns(2),

            Section::make('Kendaraan')
                ->schema([
                    TextInput::make('tipe_mobil')
                        ->label('Tipe Mobil')
                        ->required()
                        ->maxLength(50),

                    TextInput::make('nomor_polisi')
                        ->label('No Polisi')
                        ->required()
                        ->maxLength(20),
                ])
                ->columns(2),

            Section::make('Jenis Instalasi')
                ->schema([
                    Select::make('front_film')
                        ->label('Windshield')
                        ->options(self::productOptions())
                        ->searchable()
                        ->nullable(),

                    Select::make('side_film1')
                        ->label('1st Row')
                        ->options(self::productOptions())
                        ->searchable()
                        ->nullable(),

                    Select::make('side_film2')
                        ->label('2nd Row')
                        ->options(self::productOptions())
                        ->searchable()
                        ->nullable(),

                    Select::make('side_film3')
                        ->label('3rd Row')
                        ->options(self::productOptions())
                        ->searchable()
                        ->nullable(),

                    Select::make('back_film')
                        ->label('Back')
                        ->options(self::productOptions())
                        ->searchable()
                        ->nullable(),

                    Select::make('sunroof_film')
                        ->label('Sunroof / Panoramic')
                        ->options(self::productOptions())
                        ->searchable()
                        ->nullable(),
                ])
                ->columns(2),

            Section::make('Data Customer')
                ->schema([
                    TextInput::make('nama_customer')
                        ->label('Nama Customer')
                        ->required()
                        ->maxLength(255)
                        ->dehydrated(false),

                    TextInput::make('email')
                        ->label('E-Mail Address')
                        ->email()
                        ->maxLength(255)
                        ->nullable()
                        ->dehydrated(false),

                    TextInput::make('whatsapp_no')
                        ->label('No WhatsApp')
                        ->tel()
                        ->maxLength(30)
                        ->nullable()
                        ->dehydrated(false),
                ])
                ->columns(2),
        ]);
    }

    private static function productOptions(): array
    {
        return FilmSeriDetail::query()
            ->orderBy('product_name')
            ->pluck('product_name', 'product_name')
            ->all();
    }
}
