<?php

namespace App\Filament\Resources\RouteCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RouteCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Kategori')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->required()
                            ->maxLength(120)
                            ->placeholder('Contoh: Jakarta - Jawa Timur'),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),

                        Toggle::make('is_favorite')
                            ->label('Favorit')
                            ->default(false),
                    ])->columns(3),
            ])->columns(1);
    }
}
