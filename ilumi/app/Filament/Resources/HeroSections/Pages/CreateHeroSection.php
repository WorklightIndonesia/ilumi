<?php

namespace App\Filament\Resources\HeroSections\Pages;

use App\Filament\Resources\HeroSections\HeroSectionResource;
use App\Models\HeroSection;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroSection extends CreateRecord
{
    protected static string $resource = HeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('preview')
                ->label('Preview')
                ->icon('heroicon-o-eye')
                ->color('gray')
                ->extraAttributes([
                    'x-on:click' => '$event.preventDefault(); const w = window.open("about:blank", "_blank"); $wire.previewHeroSection().then(url => { if (w && url) w.location.href = url; });',
                ]),
        ];
    }

    public function previewHeroSection(): string
    {
        return \App\Support\HeroSectionPreview::createUrl(
            $this->form->getState()
        );
    }

    protected function getCreateAnotherFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateAnotherFormAction()
            ->hidden();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', [
            'record' => $this->getRecord(),
        ]);
    }
}
