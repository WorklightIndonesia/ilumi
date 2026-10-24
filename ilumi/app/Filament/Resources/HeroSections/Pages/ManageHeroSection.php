<?php

namespace App\Filament\Resources\HeroSections\Pages;

use App\Filament\Resources\HeroSections\HeroSectionResource;
use App\Models\HeroSection;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;

class ManageHeroSection extends Page
{
    protected static string $resource = HeroSectionResource::class;

    protected string $view =
        'filament.resources.hero-sections.pages.manage-hero-section';

    public ?array $data = [];

    public function mount(): void
    {
        $record = HeroSection::query()->first();

        $this->data = $record?->attributesToArray() ?? [];

        $this->form->fill($this->data);
    }

    public function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\HeroSections\Schemas\HeroSectionForm::configure(
            $schema
        )
            ->statePath('data')
            ->model(HeroSection::class);
    }

    public function save(): void
    {
        $validated = $this->form->getState();

        $record = HeroSection::query()->first();

        if ($record) {
            $record->update($validated);
        } else {
            $record = HeroSection::create($validated);
        }

        $this->form->model($record)->saveRelationships();

        Notification::make()
            ->title('Hero Section berhasil disimpan')
            ->success()
            ->send();

        $this->data = $record->attributesToArray();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
