<?php

namespace App\Filament\Resources\RouteCategories;

use App\Filament\Resources\RouteCategories\Pages\CreateRouteCategory;
use App\Filament\Resources\RouteCategories\Pages\EditRouteCategory;
use App\Filament\Resources\RouteCategories\Pages\ListRouteCategories;
use App\Filament\Resources\RouteCategories\Schemas\RouteCategoryForm;
use App\Filament\Resources\RouteCategories\Tables\RouteCategoriesTable;
use App\Models\RouteCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RouteCategoryResource extends Resource
{
    protected static ?string $model = RouteCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Kategori Rute';
    protected static ?string $pluralModelLabel = 'Kategori Rute';
    protected static string|UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return RouteCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RouteCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRouteCategories::route('/'),
            'create' => CreateRouteCategory::route('/create'),
            'edit' => EditRouteCategory::route('/{record}/edit'),
        ];
    }
}
