<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $modelLabel = 'İletişim';
    public static function canCreate(): bool
    {
        return false;
    }

    protected static ?string $navigationIcon = 'heroicon-s-phone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('introduce')
                    ->columnSpanFull()
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                    ->extraInputAttributes(['sanitize' => true])
                    ->maxLength(500)
                ->label('Tanıtım'),
                Forms\Components\RichEditor::make('vision')
                    ->columnSpanFull()
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                    ->extraInputAttributes(['sanitize' => true])
                    ->maxLength(500)
                ->label('Vizyon'),
                TextInput::make('address')
                ->required()
                ->maxLength(255)
                ->label('Adres'),
                TextInput::make('email')
                ->required()
                ->email()
                ->label('Email'),
                TextInput::make('phone')
                ->required()
                ->numeric()
                ->label('Telefon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('introduce')
                    ->words(3)
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                    ->label('Tanıtım'),
                Tables\Columns\TextColumn::make('vision')
                    ->words(3)
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                    ->label('Vizyon'),
                Tables\Columns\TextColumn::make('address')
                    ->words(3)
                    ->label('Adres'),
                Tables\Columns\TextColumn::make('email')
                    ->words(2)
                    ->label('Email'),
                Tables\Columns\TextColumn::make('phone')
                    ->words(3)
                    ->label('Telefon'),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
