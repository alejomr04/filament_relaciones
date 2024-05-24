<?php

namespace App\Filament\Instructor\Resources\StudentResource\Pages;

use App\Filament\Instructor\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;
}
