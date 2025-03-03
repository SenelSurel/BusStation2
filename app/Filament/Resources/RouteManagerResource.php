<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RouteManagerResource\Pages;
use App\Filament\Resources\RouteManagerResource\RelationManagers;
use App\Models\Station;
use App\Models\Districts;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


class RouteManagerResource extends Resource
{
    protected static ?string $model = Station::class;

    public static function relationManagers(): array {
        return [

        ];
    }


    protected static ?string $navigationIcon = 'heroicon-c-map-pin';

    protected static ?string $modelLabel = 'Sefer Rehberi';

    public static function canViewAny(): bool
    {
        return Filament::auth()->check();
    }

    public static function canView(Model $record): bool
    {
        $user = Filament::auth()->user();
        if ($user->isAdmin == 1) {
            return true;
        }

        return $record->user_id === $user->id;
    }

    public static function getEloquentQuery(): Builder
    {
        $user = Filament::auth()->user();
        if ($user->isAdmin == 1) {
            return parent::getEloquentQuery();
        }
        return parent::getEloquentQuery()->where('user_id', $user->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                ->required()
                ->label('Firma'),
                Forms\Components\TextInput::make('departureTime')
                ->required()
                    ->ValidationMessages([
                        'regex'=> 'Yanlış Format!'
                    ])
                    ->rule('regex:/^([01][0-9]|2[0-3]):[0-5][0-9]$/')
                    ->helperText('Format: Saat : Dakika')
                ->label('Sefer Tarihi'),
                Forms\Components\Select::make('direction_id')
                ->required()
                    ->options(
                        Districts::query()
                            ->pluck('districts.city', 'districts.id')
                            ->all())
                    ->native(false)
                ->label('Nereden')
                ->placeholder('Lefkoşa'),
                Forms\Components\Select::make('destination_id')
                    ->required()
                    ->options(
                        Districts::query()
                            ->pluck('districts.city', 'districts.id')
                            ->all())
                    ->native(false)
                    ->label('Nereye')
                    ->placeholder('Girne'),
                Forms\Components\TextInput::make('arrivalTime')
                    ->required()
                    ->ValidationMessages([
                        'regex'=> 'Yanlış Format!'
                    ])
                    ->rule('regex:/^([01][0-9]|2[0-3]):[0-5][0-9]$/')
                    ->helperText('Format: Saat : Dakika')
                ->label('Varış'),
                Forms\Components\FileUpload::make('brandLogo')
                    ->label('Firma Logo')
                    ->required()
                    ->helperText('(Max:1 MB) (Çözünürlük : 150x150)')
                    ->image()
                    ->ImageEditor()
                    ->imageEditorViewportWidth('80')
                    ->imageEditorViewportHeight('80')
                    ->maxSize(1024)
                    ->disk('public')
                    ->visibility('public')
                    ->directory('/uploads'),
                Forms\Components\TextInput::make('price')
                ->required()
                ->label('Fiyat'),
                Forms\Components\Select::make('schedule')
                    ->required()
                    ->native(false)
                    ->label('Günler')
                    ->options([
                        'haftaIci' => 'Hafta içi',
                        'haftaSonu' => 'Hafta sonu',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                ->label('Firma'),
                Tables\Columns\TextColumn::make('schedule')
                    ->label('Günler'),
                Tables\Columns\TextColumn::make('direction.city')
                ->label('Nereden'),
                Tables\Columns\TextColumn::make('destination.city')
                ->label('Nereye'),
                Tables\Columns\TextColumn::make('departureTime')
                ->label('Kalkış'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([

                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRouteManagers::route('/'),
            'create' => Pages\CreateRouteManager::route('/create'),
            'edit' => Pages\EditRouteManager::route('/{record}/edit'),
        ];
    }
}
