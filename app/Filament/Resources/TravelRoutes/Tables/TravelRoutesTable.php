<?php

namespace App\Filament\Resources\TravelRoutes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TravelRoutesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('cityA.name')
                    ->label('Kota A')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('cityB.name')
                    ->label('Kota B')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('price_regular')
                    ->label('Harga Reguler')
                    ->prefix('Rp ')
                    ->numeric('0', '.', '.')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                IconColumn::make('is_favorite')
                    ->label('Favorit')
                    ->boolean(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->limit(25)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label('Aktif'),
                TernaryFilter::make('is_favorite')->label('Favorit'),
                SelectFilter::make('route_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
