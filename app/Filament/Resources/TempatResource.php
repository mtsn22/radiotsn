<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TempatResource\Pages;
use App\Filament\Resources\TempatResource\RelationManagers;
use App\Models\Tempat;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TempatResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'Tempat';

    protected static ?string $navigationLabel = 'Tempat';

    protected static ?string $title = 'Tempat';

    protected ?string $heading = 'Tempat';

    protected static ?string $slug = 'tempats';

    protected ?string $subheading = 'Tempat';
    
    protected static ?int $navigationSort = 3;
    
    protected static ?string $model = Tempat::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tempat')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tempat')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListTempats::route('/'),
            'create' => Pages\CreateTempat::route('/create'),
            'edit' => Pages\EditTempat::route('/{record}/edit'),
        ];
    }    
}
