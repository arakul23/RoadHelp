<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MultipleRegionCreate extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.multiple-region-create';

    public static function getNavigationLabel(): string
    {
        return __('filament::layout.navigation.multiple_regions_create');
    }
}
