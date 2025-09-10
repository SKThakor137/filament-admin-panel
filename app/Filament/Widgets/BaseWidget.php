<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Customer;

class BaseWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Customers', Customer::count()),
            Stat::make('Active Customers', Customer::where('status', 'active')->count()),
            Stat::make('Inactive Customers', Customer::where('status', 'inactive')->count()),
        ];
    }
}
