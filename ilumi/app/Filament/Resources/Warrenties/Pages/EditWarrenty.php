<?php

namespace App\Filament\Resources\Warrenties\Pages;

use App\Filament\Resources\Warrenties\WarrentyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Models\UsersWarrenty;

class EditWarrenty extends EditRecord
{
    protected static string $resource = WarrentyResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $customer = UsersWarrenty::where(
            'ewarrenty',
            $data['ewarrenty_no']
        )->first();

        $data['nama_customer'] = $customer?->name;
        $data['email'] = $customer?->email;
        $data['whatsapp_no'] = $customer?->whatsapp_no;
        $data['status'] = $customer?->status;

        return $data;
    }

    protected function afterSave(): void
    {
        $data = $this->data;

        $customer = UsersWarrenty::where(
            'ewarrenty',
            $this->record->ewarrenty_no
        )->first();

        if ($customer) {
            $customer->update([
                'name'        => $data['nama_customer'] ?? $customer->name,
                'email'       => $data['email'] ?? null,
                'whatsapp_no' => $data['whatsapp_no'] ?? null,
                'status' => $data['status'] ?? null,
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
