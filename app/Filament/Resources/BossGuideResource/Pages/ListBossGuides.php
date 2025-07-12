<?php

namespace App\Filament\Resources\BossGuideResource\Pages;

use App\Filament\Resources\BossGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBossGuides extends ListRecords
{
    protected static string $resource = BossGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
