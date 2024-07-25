<?php

namespace App\Filament\Resources\RespondenResource\Pages;

use App\Filament\Resources\RespondenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewResponden extends ViewRecord
{
    protected static string $resource = RespondenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
