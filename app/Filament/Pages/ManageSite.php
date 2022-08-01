<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use SiteSettings;

class ManageSite extends SettingsPage
{
     protected static ?string $navigationIcon = 'heroicon-o-cog';
     protected static string $settings = SiteSettings::class;
     protected static ?string $navigationGroup = 'Settings';
     protected function getFormSchema(): array
     {
          return [
               TextInput::make('site_name')->label('Site Name')->required(),
               TextInput::make('site_description')->label('Site Name')->required(),
               FileUpload::make('site_logo')->directory('settings')->label('Logo')->required(),
               Checkbox::make('site_active')->label('Is Active'),
          ];
     }
}
