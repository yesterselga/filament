<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
     protected static ?string $pollingInterval = '1s';

     protected function getCards(): array
     {
          return [
               Card::make('Unique views', '192.1k')
                    ->description('32k increase')
                    ->descriptionIcon('heroicon-s-trending-up')
                    ->color('success')
                    ->extraAttributes([
                         'class' => 'cursor-pointer',
                         'wire:click' => '$emitUp("setStatusFilter", "processed")',
                    ]),
               Card::make('Bounce rate', '21%')
                    ->description('7% increase')
                    ->descriptionIcon('heroicon-s-trending-down')
                    ->color('danger'),
               Card::make('Average time on page', '3:12')
                    ->description('3% increase')
                    ->descriptionIcon('heroicon-s-trending-up')
                    ->color('success'),
          ];
     }
}
