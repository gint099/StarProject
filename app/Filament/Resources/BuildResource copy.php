<?php

namespace App\Filament\Resources;

use App\Models\Build;
use App\Models\Character;
use App\Models\Lightcone;
use App\Models\Relic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\BuildResource\Pages;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Tables\Table;

class BuildResource extends Resource
{
    protected static ?string $model = Build::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('character_id')
                    ->relationship('character', 'name')
                    ->required(),

                // Recommended Eidolon
                Grid::make(2)
                    ->schema([
                        TextInput::make('recommended_eidolon')
                            ->label('Recommended Eidolon (e.g. E2)')
                            ->required(),

                        Textarea::make('eidolon_description')
                            ->label('Eidolon Effect')
                            ->rows(3),
                    ]),

                // Lightcones
                Select::make('lightcones')
                    ->label('Recommended Lightcones')
                    ->relationship('lightcones', 'name')
                    ->multiple()
                    ->preload(),

                // Relic Set Combination (4-piece or 2+2)
                Repeater::make('relic_sets')
                    ->label('Relic Set Combination')
                    ->schema([
                        Select::make('relic_id')
                            ->label('Relic Set')
                            ->options(Relic::pluck('name', 'id'))
                            ->required(),
                        TextInput::make('pieces')
                            ->label('Pieces (e.g. 2-piece, 4-piece)')
                            ->required(),
                    ])
                    ->columns(2),

                // Ornament Set
                Select::make('ornament_id')
                    ->label('Planar Ornament')
                    ->relationship('ornament', 'name'),

                // Main Stats
                Repeater::make('main_stats')
                    ->label('Main Stats')
                    ->schema([
                        Select::make('part')
                            ->options([
                                'body' => 'Body',
                                'boots' => 'Boots',
                                'planar' => 'Planar Sphere',
                                'rope' => 'Link Rope',
                            ])
                            ->required(),

                        TextInput::make('value')
                            ->label('Main Stat Value')
                            ->required(),
                    ])
                    ->columns(2),

                // Substats
                Repeater::make('substats')
                    ->label('Sub Stats')
                    ->schema([
                        TextInput::make('name')->label('Stat Name'),
                        TextInput::make('value')->label('Value'),
                    ])
                    ->columns(2),

                // Synergy Characters
                Select::make('synergy_characters')
                    ->label('Synergy Characters')
                    ->relationship('synergies', 'name')
                    ->multiple()
                    ->preload(),

                // Character Stats (SPD, CR, CD, ER, HR, BE)
                Card::make([
                    Grid::make(6)
                        ->schema([
                            TextInput::make('spd')
                                ->label('SPD')
                                ->numeric()
                                ->required(),
                            TextInput::make('cr')
                                ->label('Crit Rate (%)')
                                ->numeric()
                                ->required(),
                            TextInput::make('cd')
                                ->label('Crit DMG (%)')
                                ->numeric()
                                ->required(),
                            TextInput::make('er')
                                ->label('Energy Regen (%)')
                                ->numeric()
                                ->required(),
                            TextInput::make('hr')
                                ->label('Heal Rate (%)')
                                ->numeric()
                                ->nullable(),
                            TextInput::make('be')
                                ->label('Break Effect (%)')
                                ->numeric()
                                ->nullable(),
                        ])
                        ->columns(6)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('character.name'),
                Tables\Columns\TextColumn::make('recommended_eidolon'),
            ])
            ->defaultSort('id', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuilds::route('/'),
            'create' => Pages\CreateBuild::route('/create'),
            'edit' => Pages\EditBuild::route('/{record}/edit'),
        ];
    }
}
