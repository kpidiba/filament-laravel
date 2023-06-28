<?php

namespace App\Filament\Resources\DepartementResource\Pages;

use App\Filament\Resources\DepartementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepartements extends ListRecords
{
    protected static string $resource = DepartementResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
