<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceManagerResource\Pages;
use App\Filament\Resources\ServiceManagerResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceManagerResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-s-swatch';

    protected static ?string $modelLabel = 'Hizmet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('serviceTitle')
                    ->label('Başlık'),
                Forms\Components\FileUpload::make('serviceImage')
                    ->label('İçerik')
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
                Forms\Components\RichEditor::make('serviceText')
                    ->label('Açıklama')
                    ->columnSpanFull()
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                    ->extraInputAttributes(['sanitize' => true])
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serviceTitle')
                    ->label('Başlık'),
                TextColumn::make('serviceText')
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                    ->label('Açıklama'),
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
            'index' => Pages\ListServiceManagers::route('/'),
            'create' => Pages\CreateServiceManager::route('/create'),
            'edit' => Pages\EditServiceManager::route('/{record}/edit'),
        ];
    }
}
