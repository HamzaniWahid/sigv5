<?php

namespace App\Filament\Resources\WilayahResource\Pages;

use App\Filament\Resources\WilayahResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWilayah extends ViewRecord
{
    protected static string $resource = WilayahResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
