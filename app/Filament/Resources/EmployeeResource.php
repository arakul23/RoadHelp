<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Country;
use App\Models\Employee;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

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
                Forms\Components\TextInput::make('patronymic')
                    ->required()
                    ->label('Отчество'),
                Forms\Components\Select::make('country_id')
                    ->required()
                    ->relationship('country', 'name')->label('Страна'),
                Forms\Components\TextInput::make('special_marks')
                    ->label('Особые отметки'),
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
                Tables\Columns\TextColumn::make('patronymic')
                    ->sortable()
                    ->label('Отчество'),
                Tables\Columns\TextColumn::make('country.name')
                    ->sortable()
                    ->label('Страна'),
                Tables\Columns\TextColumn::make('referral_link')
                    ->sortable()
                    ->label('Реферальная ссылка'),
                Tables\Columns\TextColumn::make('special_marks')
                    ->sortable()
                    ->label('Особые отметки'),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit'   => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('filament::layout.navigation.employees');
    }
}
