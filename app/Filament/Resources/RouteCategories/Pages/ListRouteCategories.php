<?php

namespace App\Filament\Resources\RouteCategories\Pages;

use App\Filament\Imports\RouteCategoryImporter;
use App\Filament\Resources\RouteCategories\RouteCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListRouteCategories extends ListRecords
{
    protected static string $resource = RouteCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->importer(RouteCategoryImporter::class)
                ->label('Impor Kategori Rute'),
            CreateAction::make()
                ->label('Buat Kategori Rute'),
        ];
    }
}
