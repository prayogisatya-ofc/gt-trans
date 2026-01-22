<?php

namespace App\Filament\Resources\RouteCategories\Pages;

use App\Filament\Resources\RouteCategories\RouteCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRouteCategory extends CreateRecord
{
    protected static ?string $title = 'Buat Kategori Rute';

    protected static string $resource = RouteCategoryResource::class;
}
