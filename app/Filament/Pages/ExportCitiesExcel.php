<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ExportCitiesExcel extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.export-cities-excel';

    public static function getNavigationLabel(): string
    {
        return __('filament::layout.navigation.export_cities');
    }
}
