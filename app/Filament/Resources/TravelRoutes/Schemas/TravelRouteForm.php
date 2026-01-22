<?php

namespace App\Filament\Resources\TravelRoutes\Schemas;

use App\Models\City;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TravelRouteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Rute')
                    ->schema([
                        Select::make('route_category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),

                        Select::make('city_a_id')
                            ->label('Kota A')
                            ->options(City::query()->orderBy('name')->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload()
                            ->reactive(),

                        Select::make('city_b_id')
                            ->label('Kota B')
                            ->options(City::query()->orderBy('name')->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload()
                            ->reactive()
                            ->different('city_a_id')
                            ->rules([
                                function ($get, $record) {
                                    return function (string $attribute, $value, \Closure $fail) use ($get, $record) {

                                        $a = (string) $get('city_a_id');
                                        $b = (string) $value;

                                        if (!$a || !$b) return;

                                        $min = strcmp($a, $b) < 0 ? $a : $b;
                                        $max = strcmp($a, $b) < 0 ? $b : $a;

                                        $exists = \App\Models\TravelRoute::query()
                                            ->where('city_a_id', $min)
                                            ->where('city_b_id', $max)
                                            ->when($record, fn ($q) => $q->where('id', '!=', $record->id))
                                            ->exists();

                                        if ($exists) {
                                            $fail('Rute ini sudah ada. (Dua arah dianggap sama)');
                                        }
                                    };
                                }
                            ]),

                        TextInput::make('price_regular')
                            ->label('Harga Reguler (per orang / sekali jalan)')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->prefix('Rp')
                            ->columnSpanFull(),

                        RichEditor::make('notes')
                            ->label('Catatan Tambahan (opsional)')
                            ->columnSpanFull()
                            ->dehydrateStateUsing(function ($state) {
                                $text = Str::of($state ?? '')
                                    ->replace('&nbsp;', ' ')
                                    ->replace('<br>', ' ')
                                    ->replace('<br/>', ' ')
                                    ->replace('<br />', ' ')
                                    ->stripTags()
                                    ->trim();
                                return $text->isEmpty() ? null : $state;
                            }),

                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),

                        Toggle::make('is_favorite')
                            ->label('Favorit')
                            ->default(false),
                    ])
                    ->columns(2)
            ])->columns(1);
    }
}
