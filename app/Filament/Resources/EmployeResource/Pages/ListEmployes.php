<?php

namespace App\Filament\Resources\EmployeResource\Pages;

use App\Filament\Resources\EmployeResource;
use App\Filament\Resources\EmployeResource\Widgets\EmployeOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployes extends ListRecords
{
    protected static string $resource = EmployeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EmployeOverview::class
        ];
    }
}
