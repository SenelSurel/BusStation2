<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentManagerResource\Pages;
use App\Filament\Resources\ContentManagerResource\RelationManagers;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContentManagerResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';
    protected static ?string $modelLabel = 'İçerikler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('contentTitle')
                ->label('Başlık'),
                Forms\Components\FileUpload::make('contentImage')
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
                Forms\Components\RichEditor::make('contentText')
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
                TextColumn::make('contentTitle')
                ->label('Başlık'),
                TextColumn::make('contentText')
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
            'index' => Pages\ListContentManagers::route('/'),
            'create' => Pages\CreateContentManager::route('/create'),
            'edit' => Pages\EditContentManager::route('/{record}/edit'),
        ];
    }
}
