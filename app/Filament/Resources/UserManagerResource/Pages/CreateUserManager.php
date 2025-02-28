<?php

namespace App\Filament\Resources\UserManagerResource\Pages;

use App\Filament\Resources\UserManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserManager extends CreateRecord
{
    protected static string $resource = UserManagerResource::class;
}
