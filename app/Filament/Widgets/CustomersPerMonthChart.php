<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class CustomersPerMonthChart extends ChartWidget
{
    protected ?string $heading = 'Customers Per Month';
    protected int|string|array $columnSpan = 1;


    protected function getData(): array
    {
        // Last 6 months
        $months = collect(range(0, 5))
            ->map(fn ($i) => Carbon::now()->subMonths($i)->format('F'))
            ->reverse()
            ->values();

        // Count customers per month
        $counts = collect(range(0, 5))
            ->map(fn ($i) => Customer::whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->count()
            )
            ->reverse()
            ->values();

        return [
            'datasets' => [
                [
                    'label' => 'New Customers',
                    'data' => $counts,
                    'backgroundColor' => '#3B82F6', // Tailwind blue-500
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // bar chart
    }
}
