<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
     protected static ?string $model = Category::class;

     protected static ?string $navigationIcon = 'heroicon-o-collection';

     public static function form(Form $form): Form
     {
          $name = TextInput::make('name');
          $name->required();
          $name->maxLength(255);
          $description = Textarea::make('description');
          $photo = FileUpload::make('photo');
          $photo->directory('categories');
          return $form
               ->schema([
                    Card::make()->schema([
                         $name, $description, $photo
                    ])
               ]);
     }

     public static function table(Table $table): Table
     {
          return $table
               ->columns([
                    ImageColumn::make('photo')->rounded(),
                    TextColumn::make('name'),
                    TextColumn::make('description'),
                    TextColumn::make('created_at'),
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
               'index' => Pages\ListCategories::route('/'),
               'create' => Pages\CreateCategory::route('/create'),
               'edit' => Pages\EditCategory::route('/{record}/edit'),
          ];
     }
}
