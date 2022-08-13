<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
     protected static ?string $model = User::class;

     protected static ?string $navigationIcon = 'heroicon-o-users';

     public static function form(Form $form): Form
     {
          return $form
               ->schema([
                    Grid::make()
                         ->schema(
                              fn (Component $livewire) => $livewire instanceof EditUser
                                   ? [
                                        self::detailsSection(),
                                        Section::make(__('filament-access-control::default.sections.permissions'))
                                             ->description(__('filament-access-control::default.messages.permissions_view'))
                                             ->schema([
                                                  PermissionGroup::make('permissions')
                                                       ->label(__('filament-access-control::default.fields.permissions'))
                                                       ->validationAttribute(__('filament-access-control::default.fields.permissions'))
                                                       ->resolveStateUsing(
                                                            fn (User $record) => $record->getAllPermissions()->pluck('id')->all(),
                                                       ),
                                             ]),
                                   ] : [
                                        self::detailsSection(),
                                        Section::make(__('filament-access-control::default.sections.permissions'))
                                             ->description(__('filament-access-control::default.messages.permissions_create'))
                                             ->schema([
                                                  PermissionGroup::make('permissions')
                                                       ->label(__('filament-access-control::default.fields.permissions'))
                                                       ->validationAttribute(__('filament-access-control::default.fields.permissions')),
                                             ]),
                                   ],
                         )
                         ->columns(1),
               ]);
     }

     public static function table(Table $table): Table
     {
          return $table
               ->columns([
                    TextColumn::make('full_name')
                         ->label(__('filament-access-control::default.fields.full_name'))
                         ->searchable(['first_name', 'last_name']),
                    TextColumn::make('email')
                         ->label(__('filament-access-control::default.fields.email'))
                         ->searchable(),
                    TextColumn::make('role')
                         ->label(__('filament-access-control::default.fields.role'))
                         ->getStateUsing(fn (User $record) => __(optional($record->roles->first())->name)),
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
               'index' => Pages\ListUsers::route('/'),
               'create' => Pages\CreateUser::route('/create'),
               'edit' => Pages\EditUser::route('/{record}/edit'),
               'view' => Pages\ViewUser::route('/{record}/view'),
          ];
     }
}
