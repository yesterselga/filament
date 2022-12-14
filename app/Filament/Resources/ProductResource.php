<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Resources\ProductResource\Widgets\ProductOverview;
use App\Filament\Resources\ProductResource\Widgets\ProductSalesOverview;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Toogle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
     protected static ?string $model = Product::class;
     protected static ?string $recordTitleAttribute = 'name';
     protected static ?string $navigationIcon = 'heroicon-o-collection';

     public static function form(Form $form): Form
     {
          $name = Forms\Components\TextInput::make('name');
          $name->required();
          $name->maxLength(255);

          $description = Textarea::make('description');
          $category = MultiSelect::make('category')->relationship('categories', 'name');
          $category->required();

          $tags = TagsInput::make('tags');
          $photo = FileUpload::make('photo');
          $photo->directory('products');

          return $form
               ->schema([
                    Card::make()->schema([
                         $name, $description, $category, $tags, $photo
                    ])
               ]);
     }

     public static function table(Table $table): Table
     {
          return $table
               ->columns([
                    ImageColumn::make('photo')->rounded(),
                    TextColumn::make('name'),
                    TextColumn::make('category'),
                    TagsColumn::make('tags'),
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
               'index' => Pages\ListProducts::route('/'),
               'create' => Pages\CreateProduct::route('/create'),
               'edit' => Pages\EditProduct::route('/{record}/edit'),
          ];
     }

     public static function getGloballySearchableAttributes(): array
     {
          return ['name', 'category'];
     }

     // public static function getWidgets(): array
     // {
     //      return [
     //           ProductOverview::class,
     //           ProductSalesOverview::class,
     //      ];
     // }
}
