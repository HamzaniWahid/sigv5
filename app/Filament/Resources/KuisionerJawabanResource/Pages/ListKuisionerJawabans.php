<?php

namespace App\Filament\Resources\KuisionerJawabanResource\Pages;

use App\Filament\Resources\KuisionerJawabanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuisionerJawabans extends ListRecords
{
    protected static string $resource = KuisionerJawabanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
