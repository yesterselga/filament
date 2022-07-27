<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class BranchResource extends Resource
{
     protected static ?string $model = Branch::class;
     protected static ?string $navigationIcon = 'heroicon-o-map';
     protected static function getNavigationBadge(): ?string
     {
          return static::getModel()::count();
     }

     public static function form(Form $form): Form
     {
          $name = Forms\Components\TextInput::make('name');
          $name->required();
          $name->maxLength(255);

          return $form
               ->schema([
                    Forms\Components\Card::make()->schema([
                         $name,
                         Forms\Components\TextInput::make('street')
                              ->required()
                              ->maxLength(255),
                         Forms\Components\TextInput::make('city')
                              ->required()
                              ->maxLength(255),
                         Forms\Components\TextInput::make('postal_code')->required(),
                         Forms\Components\Select::make('country')->required()->options([
                              'PH' => 'Philippines',
                         ])->searchable(),
                         Forms\Components\Select::make('status')->required()->options([
                              '0' => 'Pending',
                              '1' => 'Active',
                              '2' => 'Inactive',
                         ]),
                         Forms\Components\FileUpload::make('logo')
                    ])
               ]);
     }

     public static function table(Table $table): Table
     {
          return $table
               ->columns([
                    Tables\Columns\ImageColumn::make('logo')->rounded(),
                    Tables\Columns\TextColumn::make('name'),
                    Tables\Columns\TextColumn::make('city'),
                    Tables\Columns\TextColumn::make('country'),
                    Tables\Columns\BadgeColumn::make('status')
                         ->enum([
                              '0' => 'Pending',
                              '1' => 'Active',
                              '2' => 'Inactive',
                         ])->colors([
                              '0' => 'warning',
                              '1' => 'success',
                              '2' => 'danger',
                         ]),
                    Tables\Columns\TextColumn::make('created_at')
                         ->dateTime(),
                    Tables\Columns\TextColumn::make('updated_at')
                         ->dateTime(),
               ])
               ->filters([
                    //
                    // Filter::make('status')->toggle()
                    //      ->query(fn (Builder $query): Builder => $query->where('status', 1)),
                    SelectFilter::make('status')
                         ->options([
                              '0' => 'Pending',
                              '1' => 'Active',
                              '2' => 'Inactive',
                         ])
               ])
               ->actions([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
               ])
               ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
               ]);
     }

     public function isTableSearchable(): bool
     {
          return true;
     }

     public static function getPages(): array
     {
          return [
               'index' => Pages\ManageBranches::route('/'),
               'sort' => Pages\SortBranch::route('/sort'),
          ];
     }
}
