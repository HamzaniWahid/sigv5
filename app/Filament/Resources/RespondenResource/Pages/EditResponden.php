<?php

namespace App\Filament\Resources\RespondenResource\Pages;

use App\Filament\Resources\RespondenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResponden extends EditRecord
{
    protected static string $resource = RespondenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
