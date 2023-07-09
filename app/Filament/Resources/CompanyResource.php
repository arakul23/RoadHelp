<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Models\City;
use App\Models\Company;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $modelLabel = 'Компанія';
    protected static ?string $pluralModelLabel = 'Компанії';


    public static function form(Form $form): Form
    {
        $servicesArray = [];
        $services = Service::all()->toArray();

        foreach ($services as $service) {
            $servicesArray[$service['id']] = $service['name'];
        }

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Название'),
                Forms\Components\Select::make('region_id')
                    ->relationship('region', 'name')
                    ->required()
                    ->label('Район')
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) => $set('city_id', null)),
                Forms\Components\Select::make('city_id')
                    ->required()
                    ->label('Город')
                    ->options(function (callable $get) {
                        $cities = City::where('region_id', $get('region_id'));

                        if (!$cities) {
                            return [];
                        }

                        return $cities->pluck('name', 'id');
                    }),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->label('Адрес'),
                Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->label('Номер телефона'),
                Forms\Components\CheckboxList::make('service')
                    ->required()
                    ->relationship('service', 'name')
                    ->label('Услуги'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->label('Название'),
                Tables\Columns\TextColumn::make('region.name')
                    ->sortable()
                    ->searchable()
                    ->label('Район'),
                Tables\Columns\TextColumn::make('city.name')
                    ->sortable()
                    ->searchable()
                    ->label('Город'),
                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->label('Адрес'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->sortable()
                    ->label('Номер телефона'),
                Tables\Columns\TextColumn::make('service.name')
                    ->sortable()
                    ->label('Услуги'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Создано'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Обновлено'),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('filament::layout.navigation.companies');
    }
}
