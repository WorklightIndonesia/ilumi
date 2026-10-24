<?php

namespace App\Filament\Resources\Section2s\Pages;

use App\Filament\Resources\Section2s\Section2Resource;
use App\Filament\Resources\Section2s\Schemas\Section2Form;
use App\Models\Section2;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Schema;

class ManageSection2 extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected static string $resource = Section2Resource::class;

    protected string $view = 'filament.resources.section2.pages.manage-section2';

    public ?array $data = [];

    public function mount(): void
    {
        $record = Section2::query()->first();

        $this->form->fill($record?->attributesToArray() ?? []);
    }

    public function form(Schema $schema): Schema
    {
        return Section2Form::configure($schema)
            ->statePath('data')
            ->model(Section2::class);
    }

    public function save(): void
    {
        $validated = $this->form->getState();

        $record = Section2::query()->first();

        if ($record) {
            $record->update($validated);
        } else {
            $record = Section2::create($validated);
        }

        $this->form->model($record)->saveRelationships();

        $this->data = $record->attributesToArray();

        Notification::make()
            ->title('Section 2 berhasil disimpan')
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
