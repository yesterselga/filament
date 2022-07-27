<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class CustomerResource extends Resource
{
     protected static ?string $model = Customer::class;

     protected static ?string $navigationIcon = 'heroicon-o-collection';

     public static function form(Form $form): Form
     {
          return $form
               ->schema([
                    Forms\Components\Card::make()->schema([
                         Forms\Components\Grid::make(3)->schema([
                              TextInput::make('name')->required()->columnSpan(2),
                              FileUpload::make('picture')->directory('customers'),
                              Textarea::make('address')->columnSpan(2),

                         ])
                    ])
               ]);
     }

     public static function table(Table $table): Table
     {
          return $table
               ->columns([
                    Tables\Columns\ImageColumn::make('picture')->rounded(),
                    Tables\Columns\TextColumn::make('name')->sortable(),
                    Tables\Columns\TextColumn::make('address')->sortable(),
               ])
               ->filters([
                    //
               ])
               ->actions([
                    Tables\Actions\EditAction::make(),
               ])
               ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
               ]);
     }

     public static function getRelations(): array
     {
          return [
               //
          ];
     }

     public static function getPages(): array
     {
          return [
               'index' => Pages\ListCustomers::route('/'),
               'create' => Pages\CreateCustomer::route('/create'),
               'view' => Pages\ViewCustomer::route('/{record}'),
               'edit' => Pages\EditCustomer::route('/{record}/edit'),
          ];
     }
}
