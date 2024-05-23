<?php

namespace App\Filament\Resources\GroupResource\Pages;

use App\Filament\Resources\GroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroup extends EditRecord
{
    protected static string $resource = GroupResource::class;
    protected static ?string $title = 'Editar Grupo';
    protected static ?string $navigationGroup = 'Grupos';
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Eliminar Grupo'),
        ];
    }
}
