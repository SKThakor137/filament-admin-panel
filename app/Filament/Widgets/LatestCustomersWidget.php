<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Actions\BulkAction;

class LatestCustomersWidget extends TableWidget
{
    protected int|string|array $columnSpan = 2;


    public function table(Table $table): Table
    {
        return $table
            ->query(
                Customer::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),

                Tables\Columns\TextColumn::make('status')
                    ->badge(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Joined At')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
                ]);
            // ->recordActions([
            //     EditAction::make(),
            //     DeleteAction::make(),
            // ])
            // ->bulkActions([
            //     BulkActionGroup::make([
            //         BulkAction::make('delete')
            //             ->action(fn ($records) => $records->each->delete())
            //             ->deselectRecordsAfterCompletion()
            //             ->requiresConfirmation(),
            //     ]),
            // ]);
    }
}
