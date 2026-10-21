<?php

namespace App\Filament\Resources\FilmSeriDetails\Schemas;

use App\Models\FilmSeri;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FilmSeriDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Produk')
                ->schema([
                    Select::make('kode_seri')
                        ->label('Seri Film')
                        ->options(fn () => FilmSeri::query()
                            ->orderBy('order_no')
                            ->pluck('name', 'kode')
                            ->all())
                        ->searchable()
                        ->preload()
                        ->required(),

                    TextInput::make('product_name')
                        ->label('Nama Produk')
                        ->required()
                        ->maxLength(255),

                    Textarea::make('description')
                        ->label('Deskripsi')
                        ->required()
                        ->maxLength(255)
                        ->rows(4)
                        ->columnSpanFull(),

                    FileUpload::make('image')
                        ->label('Gambar Produk')
                        ->image()
                        ->disk('public')
                        ->directory('film-seri')
                        ->visibility('public')
                        ->imageEditor()
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Section::make('Spesifikasi Produk')
                ->schema([
                    TextInput::make('tser')
                        ->label('TSER (%)')
                        ->integer()
                        ->minValue(0)
                        ->maxValue(100)
                        ->live(onBlur: true),

                    TextInput::make('VLT')
                        ->label('VLT (%)')
                        ->integer()
                        ->minValue(0)
                        ->maxValue(100)
                        ->live(onBlur: true),

                    TextInput::make('black')
                        ->label('Black')
                        ->integer()
                        ->minValue(0)
                        ->live(onBlur: true),

                    TextInput::make('clear')
                        ->label('Clear')
                        ->integer()
                        ->minValue(0)
                        ->live(onBlur: true),

                    TextInput::make('ir_rejection_1400')
                        ->label('IR Rejection 1400 nm (%)')
                        ->integer()
                        ->minValue(0)
                        ->maxValue(100)
                        ->live(onBlur: true),

                    TextInput::make('ir_rejection_900')
                        ->label('IR Rejection 900 nm (%)')
                        ->integer()
                        ->minValue(0)
                        ->maxValue(100)
                        ->live(onBlur: true),

                    TextInput::make('uv_rejection')
                        ->label('UV Rejection (%)')
                        ->integer()
                        ->minValue(0)
                        ->maxValue(100)
                        ->live(onBlur: true),
                ])
                ->columns(2),


                Section::make('Kategori Produk')
                    ->schema([
                        TextInput::make('privacy_level')
                            ->label('Tingkat Privasi')
                            ->maxLength(255),

                        TextInput::make('visibilitas_malam')
                            ->label('Visibilitas Malam')
                            ->maxLength(255),

                        TextInput::make('tolak_panas')
                            ->label('Penolakan Panas')
                            ->maxLength(255),
                    ])
                    ->columns(2),

        ]);
    }
}
