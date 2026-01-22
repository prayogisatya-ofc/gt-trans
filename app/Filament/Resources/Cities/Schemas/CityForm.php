<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Kota')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Kota')
                            ->required()
                            ->maxLength(100)
                            ->placeholder('Contoh: Jakarta'),

                        TextInput::make('province')
                            ->label('Provinsi (opsional)')
                            ->maxLength(100)
                            ->placeholder('Contoh: DKI Jakarta'),
                    ])->columns(2),
            ])->columns(1);
    }
}
