<?php

namespace App\Filament\Resources\RouteCategories\Pages;

use App\Filament\Resources\RouteCategories\RouteCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRouteCategory extends EditRecord
{
    protected static ?string $title = 'Ubah Kategori Rute';

    protected static string $resource = RouteCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
