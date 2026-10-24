<?php

namespace App\Filament\Resources\Warrenties\Pages;

use App\Filament\Resources\Warrenties\WarrentyResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\UsersWarrenty;

class CreateWarrenty extends CreateRecord
{
    protected static string $resource = WarrentyResource::class;

    protected function afterCreate(): void
    {
        $data = $this->data;

        UsersWarrenty::create([
            'name'        => $data['nama_customer'],
            'ewarrenty'   => $this->record->ewarrenty_no,
            'email'       => $data['email'] ?? null,
            'whatsapp_no' => $data['whatsapp_no'] ?? null,
            'status'      =>  $data['status'] ?? null,
        ]);
    }
}
