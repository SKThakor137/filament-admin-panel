<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\MyWidget;
use App\Filament\Widgets\CustomersStatsWidget;
use App\Filament\Widgets\LatestCustomersWidget;
use App\Filament\Widgets\CustomersPerMonthChart;

class Dashboard extends BaseDashboard
{
 // Dashboard.php
        public function getColumns(): int|array
        {
            return 2;
        }

        public function getWidgets(): array
        {
            return [
                CustomersStatsWidget::class,   // top
                CustomersPerMonthChart::class, // left chart (1 column)
                MyWidget::class,               // right chart (1 column)
                LatestCustomersWidget::class,  // full width (2 columns)
            ];
        }
}