<?php

namespace App\Filament\Imports;

use App\Models\RouteCategory;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class RouteCategoryImporter extends Importer
{
    protected static ?string $model = RouteCategory::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('is_active')
                ->requiredMapping()
                ->castStateUsing(fn ($state) => self::toBool($state, true))
                ->rules(['required']),
            ImportColumn::make('is_favorite')
                ->castStateUsing(fn ($state) => self::toBool($state, false))
                ->rules(['nullable']),
        ];
    }

    public function resolveRecord(): RouteCategory
    {
        return new RouteCategory();
    }

    protected static function toBool(mixed $state, bool $default): bool
    {
        if ($state === null) return $default;

        $v = strtolower(trim((string) $state));

        if ($v === '') return $default;

        if (in_array($v, ['ya'], true)) {
            return true;
        }

        if (in_array($v, ['tidak'], true)) {
            return false;
        }

        return $default;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your route category import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
