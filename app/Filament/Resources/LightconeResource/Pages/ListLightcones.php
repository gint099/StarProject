<?php

namespace App\Filament\Resources\LightconeResource\Pages;

use App\Filament\Resources\LightconeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLightcones extends ListRecords
{
    protected static string $resource = LightconeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
