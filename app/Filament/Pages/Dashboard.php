<?php

 
namespace App\Filament\Pages;
 
use Filament\Pages\Dashboard as BasePage;
use App\Filament\Widgets;
use Filament\Facades\Filament;  
 
class Dashboard extends BasePage
{
    protected function getWidgets(): array
    {
        // return default widgets
        return Filament::getWidgets();
    }
}

