<?php

namespace App\Filament\Resources\HeroSections\Pages;

use App\Filament\Resources\HeroSections\HeroSectionResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditHeroSection extends EditRecord
{
    protected static string $resource = HeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Preview')
                ->icon('heroicon-o-eye')
                ->color('gray')
                ->action(function () {
                    $url = \App\Support\HeroSectionPreview::createUrl(
                        $this->form->getState()
                    );

                    $this->js(
                        'window.open(' . \Illuminate\Support\Js::from($url) . ', "_blank")'
                    );
                }),
        ];
    }

    public function previewHeroSection(): string
    {
        $state = $this->form->getState();

        return \App\Support\HeroSectionPreview::createUrl([
            'heading_1' => $state['heading_1'] ?? '',
            'description' => $state['Deskripsi'] ?? '',
            'cta_text' => $state['cta_text'] ?? '',
            'image_background' => $state['image_background'] ?? null,
        ]);
    }

}
