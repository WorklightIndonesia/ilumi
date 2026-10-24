<?php

namespace App\Filament\Resources\Section2s\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class Section2Form
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Section 2')
                    ->description('Atur konten Section 2 pada website Ilumi.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('section-2')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->helperText(
                                'Format: JPG, PNG, atau WEBP. Maksimal ukuran file 5 MB.'
                            )
                            ->nullable()
                            ->columnSpanFull(),

                        TextInput::make('heading_1')
                            ->label('Heading 1')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->nullable()
                            ->columnSpanFull(),

                        TextInput::make('cta_text')
                            ->label('CTA Text')
                            ->placeholder('Contoh: Pelajari Lebih Lanjut')
                            ->maxLength(100)
                            ->nullable()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}
