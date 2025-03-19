<?php

namespace App\Filament\Resources\ServiceManagerResource\Pages;

use App\Filament\Resources\ServiceManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceManagers extends ListRecords
{
    protected static string $resource = ServiceManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
