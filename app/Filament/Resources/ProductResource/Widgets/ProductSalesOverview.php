<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ProductSalesOverview extends BaseWidget
{
     protected function getCards(): array
     {
          return [
               Card::make('Unique views', '192.1k')
                    ->description('32k increase')
                    ->descriptionIcon('heroicon-s-trending-up')
                    ->chart([7, 2, 10, 3, 15, 4, 17])
                    ->color('success'),
          ];
     }
}
