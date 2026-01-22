<?php

namespace App\Filament\Resources\TravelRoutes\Pages;

use App\Filament\Imports\TravelRouteImporter;
use App\Filament\Resources\TravelRoutes\TravelRouteResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListTravelRoutes extends ListRecords
{
    protected static string $resource = TravelRouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->importer(TravelRouteImporter::class)
                ->label('Impor Rute'),
            CreateAction::make()
                ->label('Buat Rute'),
        ];
    }
}
