<?php

namespace App\Filament\Resources\KuisionerResource\Pages;

use App\Filament\Resources\KuisionerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuisioner extends EditRecord
{
    protected static string $resource = KuisionerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
