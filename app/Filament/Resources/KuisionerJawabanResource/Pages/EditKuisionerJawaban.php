<?php

namespace App\Filament\Resources\KuisionerJawabanResource\Pages;

use App\Filament\Resources\KuisionerJawabanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuisionerJawaban extends EditRecord
{
    protected static string $resource = KuisionerJawabanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
