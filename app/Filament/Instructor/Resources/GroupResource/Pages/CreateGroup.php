<?php

namespace App\Filament\Instructor\Resources\GroupResource\Pages;

use App\Filament\Instructor\Resources\GroupResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateGroup extends CreateRecord
{
    protected static string $resource = GroupResource::class;

    //Guarda el user que esta en la sesion 
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $userId= Auth::user()->id;
        $data['user_id'] = $userId;
        return $data;
    }
}
