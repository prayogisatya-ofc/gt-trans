<?php

namespace App\Filament\Resources\RouteCategories\Pages;

use App\Filament\Resources\RouteCategories\RouteCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRouteCategories extends ListRecords
{
    protected static string $resource = RouteCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
