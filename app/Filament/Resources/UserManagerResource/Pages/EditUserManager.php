<?php

namespace App\Filament\Resources\UserManagerResource\Pages;

use App\Filament\Resources\UserManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserManager extends EditRecord
{
    protected static string $resource = UserManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
