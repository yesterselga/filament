<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Widgets\ProductOverview;
use App\Filament\Resources\ProductResource\Widgets\ProductSalesOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
     protected static string $resource = ProductResource::class;

     protected function getActions(): array
     {
          return [
               Actions\CreateAction::make(),
          ];
     }

     protected function getHeaderWidgets(): array
     {
          return [

               ProductSalesOverview::class,

          ];
     }

     protected function getFooterWidgets(): array
     {
          return [ProductOverview::class,];
     }
}
