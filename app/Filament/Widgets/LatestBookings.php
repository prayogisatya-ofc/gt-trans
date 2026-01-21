<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Bookings\BookingResource;
use App\Models\Booking;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestBookings extends TableWidget
{
    protected static ?string $heading = 'Booking Terbaru';
    protected static ?int $sort = 3;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Booking::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('booking_code')
                    ->label('Kode')
                    ->copyable()
                    ->searchable(),

                TextColumn::make('service_type')
                    ->label('Layanan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'regular' => 'Reguler',
                        'charter' => 'Carter',
                        'express' => 'Paket Kilat',
                        default => $state,
                    }),

                TextColumn::make('fromCity.name')->label('Dari')->searchable(),
                TextColumn::make('toCity.name')->label('Ke')->searchable(),

                TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->prefix('Rp ')
                    ->numeric(0, ',', '.'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'new' => 'Baru',
                        'departed1' => 'Berangkat 1',
                        'departed2' => 'Berangkat 2',
                        'cancelled' => 'Cancelled',
                        default => $state,
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                Action::make('detail')
                    ->label('Detail')
                    ->url(fn (Booking $record) => BookingResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
