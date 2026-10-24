<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Section')
                    ->description('Atur konten utama halaman website Ilumi.')
                    ->schema([
                        FileUpload::make('image_background')
                            ->label('Background Foto')
                            ->image()
                            ->disk('public')
                            ->directory('hero-sections')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->nullable()
                            ->required()
                            ->helperText('Format: JPG, PNG, atau WEBP. Maksimal ukuran file 5 MB.'),

                        TextInput::make('heading_1')
                            ->label('Heading 1')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('Deskripsi')
                            ->label('Description')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('cta_text')
                            ->label('Teks Tombol')
                            ->required()
                            ->placeholder('Contoh: Temukan Produk')
                            ->maxLength(100),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}
