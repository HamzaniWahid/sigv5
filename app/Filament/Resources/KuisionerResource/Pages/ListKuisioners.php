<?php

namespace App\Filament\Resources\KuisionerResource\Pages;

use App\Filament\Resources\KuisionerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuisioners extends ListRecords
{
    protected static string $resource = KuisionerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
