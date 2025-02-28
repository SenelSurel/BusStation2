<?php

namespace App\Filament\Resources\RouteManagerResource\Pages;

use App\Filament\Resources\RouteManagerResource;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;

class EditRouteManager extends EditRecord
{
    protected static string $resource = RouteManagerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Filament::auth()->id();
        return $data;
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
