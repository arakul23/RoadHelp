<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Имя'),
                Forms\Components\TextInput::make('surname')
                    ->required()
                    ->label('Фамилия'),
                Forms\Components\TextInput::make('car_model')
                    ->required()
                    ->label('Модель машины'),
                Forms\Components\TextInput::make('car_number')
                    ->required()
                    ->label('Номер машины'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->label('Email'),
                Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->label('Номер телефона'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->label('Имя'),
                Tables\Columns\TextColumn::make('surname')
                    ->sortable()
                    ->label('Фамилия'),
                Tables\Columns\TextColumn::make('car_model')
                    ->sortable()
                    ->label('Модель машины'),
                Tables\Columns\TextColumn::make('car_number')
                    ->sortable()
                    ->label('Номер машины'),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->label('Email'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->sortable()
                    ->label('Номер телефона'),
                Tables\Columns\TextColumn::make('order_id')
                    ->sortable()
                    ->label('Номер оплаты'),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('filament::layout.navigation.clients');
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
