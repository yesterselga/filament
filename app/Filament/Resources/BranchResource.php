<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Notifications\Notification;
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
     protected static ?string $recordTitleAttribute = 'name';
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

          $t = $table->columns([
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
          ]);


          $t->filters([
               //
               // Filter::make('status')->toggle()
               //      ->query(fn (Builder $query): Builder => $query->where('status', 1)),
               SelectFilter::make('status')
                    ->options([
                         '0' => 'Pending',
                         '1' => 'Active',
                         '2' => 'Inactive',
                    ])->visible(fn (Branch $record): bool => auth()->user()->can('branch.filter', $record))
          ]);

          $t->actions([
               Tables\Actions\EditAction::make()
                    ->visible(fn (Branch $record): bool => auth()->user()->can('branch.edit', $record))
                    ->after(function (Branch $record) {
                         activity()->log('Updated branch ' . $record->id);
                    }),
               Tables\Actions\DeleteAction::make()
                    ->visible(fn (Branch $record): bool => auth()->user()->can('branch.delete', $record))
                    ->after(function (Branch $record) {
                         activity()->log('Deleted branch ' . $record->id);
                    }),
          ])->bulkActions([
               Tables\Actions\DeleteBulkAction::make(),
          ]);
          return $t;
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

     public static function getGloballySearchableAttributes(): array
     {
          return ['name', 'city'];
     }
}
