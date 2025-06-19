<?php
// File: app/Filament/Resources/BuildResource/Pages/ViewBuild.php

namespace App\Filament\Resources\BuildResource\Pages;

use App\Filament\Resources\BuildResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewBuild extends ViewRecord
{
    protected static string $resource = BuildResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Build Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('character.name')
                            ->label('Character'),
                        Infolists\Components\TextEntry::make('description')
                            ->columnSpanFull(),
                    ])->columns(2),

                Infolists\Components\Section::make('Character')
                    ->schema([
                        Infolists\Components\ImageEntry::make('character.background_image')
                            ->label('Character Background')
                            ->size(300),
                        Infolists\Components\ImageEntry::make('character.path')
                            ->label('Path')
                            ->getStateUsing(fn ($record) => "assets/paths/{$record->character->path}.png")
                            ->size(60),
                        Infolists\Components\ImageEntry::make('character.element')
                            ->label('Element')
                            ->getStateUsing(fn ($record) => "assets/elements/{$record->character->element}.png")
                            ->size(60),
                    ])->columns(3),

                Infolists\Components\Section::make('Stats')
                    ->schema([
                        Infolists\Components\TextEntry::make('spd_value')
                            ->label('SPD')
                            ->suffix(' SPD'),
                        Infolists\Components\TextEntry::make('cr_value')
                            ->label('CRIT Rate')
                            ->suffix('%'),
                        Infolists\Components\TextEntry::make('cd_value')
                            ->label('CRIT DMG')
                            ->suffix('%'),
                        Infolists\Components\TextEntry::make('er_value')
                            ->label('Energy Regen')
                            ->suffix('%'),
                        Infolists\Components\TextEntry::make('hr_value')
                            ->label('Healing Rate')
                            ->suffix('%'),
                        Infolists\Components\TextEntry::make('be_value')
                            ->label('Break Effect')
                            ->suffix('%'),
                    ])->columns(3),

                Infolists\Components\Section::make('Lightcones')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('lightcones')
                            ->schema([
                                Infolists\Components\ImageEntry::make('image')
                                    ->size(80),
                                Infolists\Components\TextEntry::make('name'),
                            ])
                            ->columns(2),
                    ]),

                Infolists\Components\Section::make('Main Stats')
                    ->schema([
                        Infolists\Components\TextEntry::make('body_main_stat')
                            ->label('Body'),
                        Infolists\Components\TextEntry::make('boots_main_stat')
                            ->label('Boots'),
                        Infolists\Components\TextEntry::make('planar_main_stat')
                            ->label('Planar'),
                        Infolists\Components\TextEntry::make('rope_main_stat')
                            ->label('Rope'),
                    ])->columns(4),

                Infolists\Components\Section::make('Eidolon')
                    ->schema([
                        Infolists\Components\TextEntry::make('eidolon_level')
                            ->formatStateUsing(fn ($state) => $state ? "E{$state}" : 'E0'),
                        Infolists\Components\TextEntry::make('eidolon_data.name')
                            ->label('Eidolon Name')
                            ->getStateUsing(function ($record) {
                                $eidolonData = $record->eidolon_data;
                                return $eidolonData['name'] ?? 'N/A';
                            }),
                        Infolists\Components\TextEntry::make('eidolon_data.description')
                            ->label('Eidolon Effect')
                            ->getStateUsing(function ($record) {
                                $eidolonData = $record->eidolon_data;
                                return $eidolonData['description'] ?? 'N/A';
                            })
                            ->columnSpanFull(),
                    ])->columns(2),

                Infolists\Components\Section::make('Relic Sets')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('relic_sets_data')
                            ->schema([
                                Infolists\Components\TextEntry::make('relic.name')
                                    ->label('Set Name'),
                                Infolists\Components\TextEntry::make('pieces')
                                    ->label('Pieces')
                                    ->suffix('-Piece'),
                                Infolists\Components\TextEntry::make('set_bonus')
                                    ->label('Set Bonus')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),
                    ]),

                Infolists\Components\Section::make('Synergy Characters')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('synergy_characters')
                            ->schema([
                                Infolists\Components\ImageEntry::make('profile_image')
                                    ->size(60)
                                    ->circular(),
                                Infolists\Components\TextEntry::make('name'),
                            ])
                            ->columns(6),
                    ]),
            ]);
    }
}
