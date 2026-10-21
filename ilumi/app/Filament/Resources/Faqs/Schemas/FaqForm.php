<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\Faq;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('kode')
                ->label('Kode FAQ')
                ->disabled()
                ->dehydrated(false)
                ->visibleOn(false),

            Select::make('order_no')
                ->label('Urutan')
                ->options(function (?Faq $record) {
                    $total = Faq::count();

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

            Textarea::make('question')
                ->label('Pertanyaan')
                ->required()
                ->rows(3)
                ->columnSpanFull(),

            Textarea::make('answer')
                ->label('Jawaban')
                ->required()
                ->rows(8)
                ->columnSpanFull(),
        ]);
    }
}
