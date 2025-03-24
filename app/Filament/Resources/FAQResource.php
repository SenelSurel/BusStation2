<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FAQResource\Pages;
use App\Filament\Resources\FAQResource\RelationManagers;
use App\Models\Faqs;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FAQResource extends Resource
{
    protected static ?string $model = Faqs::class;

    protected static ?string $navigationIcon = 'heroicon-m-question-mark-circle';

    protected static ?string $modelLabel = 'Sorular';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('question')
                ->required()
                ->label('Soru'),
                Forms\Components\RichEditor::make('answer')
                    ->columnSpanFull()
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                    ->extraInputAttributes(['sanitize' => true])
                    ->maxLength(500)
            ->label('Cevap')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question')
                ->label('Soru'),
                TextColumn::make('answer')
                    ->words(10)
                    ->formatStateUsing(fn ($state) => strip_tags($state))
                ->label('Cevap'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFAQS::route('/'),
            'create' => Pages\CreateFAQ::route('/create'),
            'edit' => Pages\EditFAQ::route('/{record}/edit'),
        ];
    }
}
