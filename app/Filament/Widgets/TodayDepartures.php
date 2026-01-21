<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TodayDepartures extends TableWidget
{
    protected static ?string $heading = 'Keberangkatan Hari Ini';
    protected static ?int $sort = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Booking::query()
                    ->whereDate('departure_date', now()->toDateString())
                    ->whereIn('status', ['new'])
                    ->latest()
                    ->limit(5))
            ->columns([
                TextColumn::make('booking_code')
                    ->label('Kode')
                    ->copyable(),

                TextColumn::make('customer_name')
                    ->label('Pemesan')
                    ->searchable()
                    ->limit(25),

                TextColumn::make('fromCity.name')->label('Dari'),
                TextColumn::make('toCity.name')->label('Ke'),

                TextColumn::make('service_type')
                    ->label('Layanan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'regular' => 'Reguler',
                        'charter' => 'Carter',
                        'express' => 'Paket Kilat',
                        default => $state,
                    }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ])
            ->emptyStateHeading('Tidak ada keberangkatan hari ini');
    }
}
