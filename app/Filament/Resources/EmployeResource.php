<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeResource\Pages;
use App\Filament\Resources\EmployeResource\RelationManagers;
use App\Models\City;
use App\Models\Country;
use App\Models\Employe;
use App\Models\State;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeResource extends Resource
{
    protected static ?string $model = Employe::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make("lastname")->required(),
                    TextInput::make("firstname")->required(),
                    TextInput::make("adress")->required(),
                    TextInput::make("zipcode")->required(),
                    DatePicker::make("birthdate")->required(),
                    DatePicker::make("Datehired")->required(),
                    Select::make('country_id')->relationship('country', 'name')
                        ->label('Country')->options(Country::all()
                            ->pluck('name', 'id')->toArray())
                        ->reactive()->afterStateUpdated(fn (callable $set) => $set('state_id', null))
                        ->required(),
                    Select::make('state_id')->label('State')->options(function (callable $get) {
                        $country = Country::find($get('country_id'));
                        if (!$country) {
                            return State::all()->pluck('name', 'id');
                        }
                        return $country->states->pluck('name', 'id');
                    })->reactive()->afterStateUpdated(fn (callable $set) => $set('city_id', null))->required(),
                    Select::make('city_id')->label('City')->options(function (callable $get) {
                        $states = State::find($get('city_id'));
                        if (!$states) {
                            return City::all()->pluck('name', 'id');
                        }
                        return $states->cities->pluck('name', 'id');
                    })->required(),
                    // Select::make('city_id')->relationship('city', 'name')->required(),
                    Select::make('departement_id')->relationship('departement', 'name')->required(),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('lastname')->sortable(),
                TextColumn::make('firstname')->sortable(),
                TextColumn::make('adress')->sortable(),
                TextColumn::make('zipcode')->sortable(),
                TextColumn::make('birthdate')->sortable(),
                TextColumn::make('Datehired')->sortable(),
            ])
            ->filters([
                SelectFilter::make('departement')->relationship('departement', 'name')
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
            'index' => Pages\ListEmployes::route('/'),
            'create' => Pages\CreateEmploye::route('/create'),
            'edit' => Pages\EditEmploye::route('/{record}/edit'),
        ];
    }
}
