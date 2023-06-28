<?php

namespace App\Filament\Resources\DepartementResource\Pages;

use App\Filament\Resources\DepartementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartement extends EditRecord
{
    protected static string $resource = DepartementResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
