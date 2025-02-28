<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserManagerResource\Pages;
use App\Filament\Resources\UserManagerResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;


class UserManagerResource extends Resource
{
    public static function canViewAny(): bool
    {
        return auth()->check() && auth()->user()->isAdmin === 1;
    }

    public static function canView(Model $record): bool
    {
        return auth()->check() && auth()->user()->isAdmin === 1;
    }

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    protected static ?string $modelLabel = 'Kullanıcı';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->label('Kullanıcı Adı')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')->email()
                    ->label('Email')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Şifre')
                    ->password()
                    ->revealable()
                    ->required(),
                Forms\Components\TextInput::make('password_confirmation')->same('password')
                    ->label('Şifre Doğrula')
                    ->validationMessages([
                        'same' => 'Eşleşmeyen Şifre!',
                    ])
                    ->password()
                    ->revealable()
                    ->required(),
                Forms\Components\Toggle::make('isAdmin')
                    ->default(false)
                    ->label('Admin')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Kullanıcı Adı')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('isAdmin')
                    ->label('Admin')
                    ->boolean()
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
            'index' => Pages\ListUserManagers::route('/'),
            'create' => Pages\CreateUserManager::route('/create'),
            'edit' => Pages\EditUserManager::route('/{record}/edit'),
        ];
    }
}
