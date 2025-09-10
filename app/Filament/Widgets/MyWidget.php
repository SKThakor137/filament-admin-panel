<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Customer;

class MyWidget extends ChartWidget
{
    protected ?string $heading = 'Customers Status';
    protected int|string|array $columnSpan = 1;


    protected function getData(): array
    {
        $active = Customer::where('status', 'active')->count();
        $inactive = Customer::where('status', 'inactive')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Customers',
                    'data' => [$active, $inactive],
                    'backgroundColor' => ['#10B981', '#EF4444'], // green & red
                ],
            ],
            'labels' => ['Active', 'Inactive'],
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // pie, bar, line, doughnut, etc.
    }
}
