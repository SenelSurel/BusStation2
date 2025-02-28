<?php

namespace App\Filament\Resources\RouteManagerResource\Pages;

use App\Filament\Resources\RouteManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRouteManagers extends ListRecords
{
    protected static string $resource = RouteManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
