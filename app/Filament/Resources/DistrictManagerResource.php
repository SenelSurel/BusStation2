<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DistrictManagerResource\Pages;
use App\Filament\Resources\DistrictManagerResource\RelationManagers;
use App\Models\Districts;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class DistrictManagerResource extends Resource
{
    protected static ?string $model = Districts::class;

    protected static ?string $navigationIcon = 'iconsax-bul-row-vertical';
    protected static ?string $modelLabel = 'Şehir';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('city')
                ->label('Şehir'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('city')
                    ->label('Şehir'),
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
            'index' => Pages\ListDistrictManagers::route('/'),
            'create' => Pages\CreateDistrictManager::route('/create'),
            'edit' => Pages\EditDistrictManager::route('/{record}/edit'),
        ];
    }
}
