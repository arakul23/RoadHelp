<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $modelLabel = 'Контакт';
    protected static ?string $pluralModelLabel = 'Контакти';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->label('Електрона пошта'),
                Forms\Components\TextInput::make('phone_number')
                    ->label('Номер телефону'),
                Forms\Components\TextInput::make('work_time')
                    ->label('Час роботи')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->label('Електрона пошта'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->sortable()
                    ->label('Номер телефону'),
                Tables\Columns\TextColumn::make('work_time')
                    ->sortable()
                    ->label('Час роботи'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Створено'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Оновлено'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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

    public static function getNavigationLabel(): string
    {
        return __('filament::layout.navigation.contacts');
    }
}
