<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Mobil')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Unit')
                            ->required()
                            ->maxLength(80)
                            ->placeholder('Contoh: Toyota Avanza / Elf 19 Seat'),

                        TextInput::make('seat_count')
                            ->label('Jumlah Seat')
                            ->required()
                            ->numeric()
                            ->minValue(1),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])->columns(2),
            ])->columns(1);
    }
}
