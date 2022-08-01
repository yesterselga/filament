<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Filament\Resources\ActivityLogResource\RelationManagers;
use App\Models\ActivityLog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityLogResource extends Resource
{
     protected static ?string $model = ActivityLog::class;

     protected static ?string $navigationIcon = 'heroicon-o-collection';
     protected static ?string $navigationGroup = 'Administration';
     public static function form(Form $form): Form
     {
          return $form
               ->schema([
                    //
               ]);
     }

     public static function table(Table $table): Table
     {
          return $table
               ->columns([
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
               'index' => Pages\ListActivityLogs::route('/'),
               'create' => Pages\CreateActivityLog::route('/create'),
               'edit' => Pages\EditActivityLog::route('/{record}/edit'),
          ];
     }
}
