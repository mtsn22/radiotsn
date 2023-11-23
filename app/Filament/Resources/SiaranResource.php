<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiaranResource\Pages;
use App\Filament\Resources\SiaranResource\RelationManagers;
use App\Models\Siaran;
use App\Models\Ustadz;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class SiaranResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'Siaran';

    protected static ?string $navigationLabel = 'Siaran';

    protected static ?string $title = 'Siaran';

    protected ?string $heading = 'Siaran';

    protected static ?string $slug = 'siarans';

    protected ?string $subheading = 'Siaran';
    
    protected static ?int $navigationSort = 4;
    
    protected static ?string $model = Siaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-radio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('hari')
                ->options([
                    'Senin' => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                    'Sabtu' => 'Sabtu',
                    'Ahad' => 'Ahad',
                ])
                ->searchable()
                ->nullable(),
                
                Select::make('waktu')
                ->options([
                    'Pagi' => 'Pagi',
                    'Siang' => 'Siang',
                    'Sore' => 'Sore',
                    'Malam' => 'Malam',
                ])
                ->searchable(),

                Select::make('pekan')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ])
                ->searchable(),

                Select::make('ustadz_id')
                ->relationship('asatidz','ustadz')
                ->preload()
                ->searchable(),

                Select::make('materi_id')
                ->relationship('materikajian','materi')
                ->preload()
                ->searchable()
                ->nullable(),

                Select::make('tempat_id')
                ->relationship('tempatkajian','tempat')
                ->preload()
                ->searchable(),
                
                DatePicker::make('tanggal')->nullable(),

                FileUpload::make('poster')
                ->image()
                ->directory('siarans/poster')
                ->preserveFilenames(),


                TextInput::make('judul'),

                

                // $table->string('slug')->Unique;
                // $table->boolean('is_active')->default(false);
                // $table->softDeletes();
                // $table->timestamps();
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('is_active')
                ->label('Aktif')
                ->sortable()
                ->alignCenter(),
                
                TextColumn::make('hari'),
                TextColumn::make('waktu'),
                TextColumn::make('pekan'),
                TextColumn::make('tempatkajian.tempat'),
                TextColumn::make('asatidz.ustadz'),
                TextColumn::make('materikajian.materi'),
                TextColumn::make('tanggal'),
 
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
            'index' => Pages\ListSiarans::route('/'),
            'create' => Pages\CreateSiaran::route('/create'),
            'edit' => Pages\EditSiaran::route('/{record}/edit'),
        ];
    }    
}
