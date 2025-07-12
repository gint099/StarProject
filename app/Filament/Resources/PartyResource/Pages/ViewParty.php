<?php

use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;
use App\Filament\Resources\PartyResource;


class ViewParty extends ViewRecord
{
    protected static string $resource = PartyResource::class;

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Placeholder::make('type')->content(fn ($record) => $record->type)->label('Tipe Tim'),
            Forms\Components\Placeholder::make('name')->content(fn ($record) => $record->name)->label('Nama Tim'),

            Forms\Components\Fieldset::make('Komposisi Tim')
                ->schema([
                    Forms\Components\Placeholder::make('dps')->label('DPS')->content(fn ($record) => $record->dps->name ?? '-'),
                    Forms\Components\Placeholder::make('subDps')->label('Sub DPS')->content(fn ($record) => $record->subDps->name ?? '-'),
                    Forms\Components\Placeholder::make('support')->label('Support')->content(fn ($record) => $record->support->name ?? '-'),
                    Forms\Components\Placeholder::make('sustain')->label('Sustain')->content(fn ($record) => $record->sustain->name ?? '-'),
                ]),

            Forms\Components\Textarea::make('description')->disabled()->label('Strategi / Deskripsi Tim'),
        ];
    }
}

