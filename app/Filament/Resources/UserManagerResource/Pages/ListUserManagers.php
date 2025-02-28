<?php

namespace App\Filament\Resources\UserManagerResource\Pages;

use App\Filament\Resources\UserManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserManagers extends ListRecords
{
    protected static string $resource = UserManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
