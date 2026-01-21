<?php

namespace App\Filament\Resources\Bookings\Tables;

use App\Models\Booking;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking_code')
                    ->label('Kode')
                    ->searchable()
                    ->copyable()
                    ->sortable(),

                TextColumn::make('service_type')
                    ->label('Layanan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'regular' => 'Reguler',
                        'charter' => 'Carter',
                        'express' => 'Paket Kilat',
                        default => $state,
                    }),

                TextColumn::make('fromCity.name')
                    ->label('Dari')
                    ->searchable(),

                TextColumn::make('toCity.name')
                    ->label('Ke')
                    ->searchable(),

                TextColumn::make('departure_date')
                    ->label('Berangkat')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->numeric(0, ',', '.')
                    ->prefix('Rp ')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'new' => 'Baru',
                        'departed1' => 'Berangkat 1',
                        'departed2' => 'Berangkat 2',
                        'cancelled' => 'Dibatalkan',
                        default => $state,
                    }),
            ])
            ->filters([
                SelectFilter::make('service_type')
                    ->label('Layanan')
                    ->options([
                        'regular' => 'Reguler',
                        'charter' => 'Carter',
                        'express' => 'Paket Kilat',
                    ]),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'new' => 'Baru',
                        'departed1' => 'Berangkat 1',
                        'departed2' => 'Berangkat 2',
                        'cancelled' => 'Dibatalkan',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make('cancel')
                    ->label('Cancel')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->form([
                        Textarea::make('cancel_reason')
                            ->label('Alasan Pembatalan')
                            ->required()
                            ->rows(3),
                    ])
                    ->requiresConfirmation()
                    ->visible(fn (Booking $record) => $record->status !== 'cancelled')
                    ->action(function (Booking $record, array $data) {
                        $record->update([
                            'status' => 'cancelled',
                            'cancel_reason' => $data['cancel_reason'],
                        ]);
                    }),
                EditAction::make()->visible(false),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
