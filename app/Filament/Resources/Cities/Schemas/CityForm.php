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
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->maxLength(100)
                            ->placeholder('Contoh: Jakarta'),

                        TextInput::make('province')
                            ->label('Provinsi (opsional)')
                            ->maxLength(100)
                            ->placeholder('Contoh: DKI Jakarta'),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(120)
                            ->helperText('Biarkan kosong untuk generate otomatis dari nama kota.'),
                    ])->columns(2),
            ])->columns(1);
    }
}
