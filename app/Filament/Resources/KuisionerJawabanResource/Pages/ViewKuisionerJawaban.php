<?php

namespace App\Filament\Resources\KuisionerJawabanResource\Pages;

use App\Filament\Resources\KuisionerJawabanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKuisionerJawaban extends ViewRecord
{
    protected static string $resource = KuisionerJawabanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
