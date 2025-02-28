<?php

namespace App\Filament\Resources\DistrictManagerResource\Pages;

use App\Filament\Resources\DistrictManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDistrictManagers extends ListRecords
{
    protected static string $resource = DistrictManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
