<?php

namespace App\Filament\Resources\RouteManagerResource\Pages;

use App\Filament\Resources\RouteManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Facades\Filament;



class CreateRouteManager extends CreateRecord
{
    protected static string $resource = RouteManagerResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Filament::auth()->id();
        return $data;
    }
}
