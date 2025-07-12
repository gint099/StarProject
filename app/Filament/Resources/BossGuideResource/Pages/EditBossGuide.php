<?php

namespace App\Filament\Resources\BossGuideResource\Pages;

use App\Filament\Resources\BossGuideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBossGuide extends EditRecord
{
    protected static string $resource = BossGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
