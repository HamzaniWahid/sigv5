<?php

namespace App\Filament\Resources\KuisionerResource\Pages;

use App\Filament\Resources\KuisionerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKuisioner extends ViewRecord
{
    protected static string $resource = KuisionerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
