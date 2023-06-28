<?php

namespace App\Filament\Resources\EmployeResource\Pages;

use App\Filament\Resources\EmployeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmploye extends EditRecord
{
    protected static string $resource = EmployeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
