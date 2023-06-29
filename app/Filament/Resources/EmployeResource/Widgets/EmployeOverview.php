<?php

namespace App\Filament\Resources\EmployeResource\Widgets;

use App\Models\Country;
use App\Models\Employe;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code',"US")->withCount('employes')->first();
        $tg = Country::where('country_code',"TG")->withCount('employes')->first();
        return [
            Card::make("All employes",Employe::all()->count()),
            Card::make($us->name ." Employes",$us->employes_count ==0?0:$us->employes_count),
            Card::make($tg->name ." Employes",$tg->employes_count ==0?0:$tg->employes_count),
        ];
    }
}
