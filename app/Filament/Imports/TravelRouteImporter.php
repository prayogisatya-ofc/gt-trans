<?php

namespace App\Filament\Imports;

use App\Models\City;
use App\Models\RouteCategory;
use App\Models\TravelRoute;
use Filament\Actions\Imports\Exceptions\RowImportFailedException;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class TravelRouteImporter extends Importer
{
    protected static ?string $model = TravelRoute::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('category')
                ->relationship(resolveUsing:'name')
                ->label('Kategori Rute')
                ->requiredMapping()
                ->rules(['required', 'max:191']),
            ImportColumn::make('cityA')
                ->relationship(resolveUsing:'name')
                ->label('Kota A')
                ->requiredMapping()
                ->rules(['required', 'max:191']),
            ImportColumn::make('cityB')
                ->relationship(resolveUsing:'name')
                ->label('Kota B')
                ->requiredMapping()
                ->rules(['required', 'max:191']),
            ImportColumn::make('price_regular')
                ->label('Harga Reguler')
                ->requiredMapping()
                ->rules(['required', 'integer']),
            ImportColumn::make('is_active')
                ->label('Aktif')
                ->castStateUsing(fn ($state) => self::toBool($state, true))
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('is_favorite')
                ->label('Favorit')
                ->castStateUsing(fn ($state) => self::toBool($state, false))
                ->rules(['nullable']),
        ];
    }

    public function resolveRecord(): TravelRoute
    {
        return new TravelRoute();
    }

    protected function beforeFill(): void
    {
        $data = $this->data;

        $cityAName = trim((string) ($data['cityA'] ?? ''));
        $cityBName = trim((string) ($data['cityB'] ?? ''));

        $cityA = City::query()->where('name', $cityAName)->first();
        $cityB = City::query()->where('name', $cityBName)->first();

        if ($cityA->id === $cityB->id) {
            throw new RowImportFailedException("Kota A dan Kota B tidak boleh sama.");
        }

        $cityAId = (string) $cityA->id;
        $cityBId = (string) $cityB->id;

        if (strcmp($cityAId, $cityBId) > 0) {
            [$cityA, $cityB] = [$cityB, $cityA];
        }

        if (blank($this->record->slug)) {
            $this->record->slug = Str::slug($cityA->name . '-' . $cityB->name);
        }

        $this->record->is_active = $this->record->is_active ?? true;
        $this->record->is_favorite = $this->record->is_favorite ?? false;
    }

    protected static function toBool(mixed $state, bool $default): bool
    {
        if ($state === null) return $default;

        $v = strtolower(trim((string) $state));
        if ($v === '') return $default;

        if (in_array($v, ['ya'], true)) return true;
        if (in_array($v, ['tidak'], true)) return false;

        return $default;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your travel route import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
