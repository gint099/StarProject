<?php

namespace App\Filament\Resources\LightconeResource\Pages;

use App\Filament\Resources\LightconeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLightcone extends EditRecord
{
    protected static string $resource = LightconeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
