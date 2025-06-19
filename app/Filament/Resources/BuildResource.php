<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuildResource\Pages;
use App\Models\Build;
use App\Models\Character;
use App\Models\Lightcone;
use App\Models\Relic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BuildResource extends Resource
{
    protected static ?string $model = Build::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Character Builds';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('character_id')
                            ->label('Character')
                            ->options(Character::all()->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Lightcones')
                    ->schema([
                        Forms\Components\Select::make('lightcone_ids')
                            ->label('Lightcones')
                            ->options(Lightcone::all()->pluck('name', 'id'))
                            ->multiple()
                            ->searchable()
                            ->preload(),
                    ]),

                Forms\Components\Section::make('Stats Values')
                    ->schema([
                        Forms\Components\TextInput::make('spd_value')
                            ->label('SPD')
                            ->numeric()
                            ->step(0.1),

                        Forms\Components\TextInput::make('cr_value')
                            ->label('CR (%)')
                            ->numeric()
                            ->step(0.1),

                        Forms\Components\TextInput::make('cd_value')
                            ->label('CD (%)')
                            ->numeric()
                            ->step(0.1),

                        Forms\Components\TextInput::make('er_value')
                            ->label('ER (%)')
                            ->numeric()
                            ->step(0.1),

                        Forms\Components\TextInput::make('hr_value')
                            ->label('HR (%)')
                            ->numeric()
                            ->step(0.1),

                        Forms\Components\TextInput::make('be_value')
                            ->label('BE (%)')
                            ->numeric()
                            ->step(0.1),
                    ])->columns(3),

                Forms\Components\Section::make('Main Stats')
                    ->schema([
                        Forms\Components\Select::make('body_main_stat')
                            ->label('Body Main Stat')
                            ->options([
                                'hp' => 'HP%',
                                'atk' => 'ATK%',
                                'def' => 'DEF%',
                                'cr' => 'CRIT Rate%',
                                'cd' => 'CRIT DMG%',
                                'hr' => 'Healing Boost%',
                                'ehr' => 'Effect Hit Rate%',
                            ]),

                        Forms\Components\Select::make('boots_main_stat')
                            ->label('Boots Main Stat')
                            ->options([
                                'hp' => 'HP%',
                                'atk' => 'ATK%',
                                'def' => 'DEF%',
                                'spd' => 'SPD',
                            ]),

                        Forms\Components\Select::make('planar_main_stat')
                            ->label('Planar Main Stat')
                            ->options([
                                'hp' => 'HP%',
                                'atk' => 'ATK%',
                                'def' => 'DEF%',
                                'fire_dmg' => 'Fire DMG%',
                                'ice_dmg' => 'Ice DMG%',
                                'lightning_dmg' => 'Lightning DMG%',
                                'wind_dmg' => 'Wind DMG%',
                                'physical_dmg' => 'Physical DMG%',
                                'quantum_dmg' => 'Quantum DMG%',
                                'imaginary_dmg' => 'Imaginary DMG%',
                            ]),

                        Forms\Components\Select::make('rope_main_stat')
                            ->label('Rope Main Stat')
                            ->options([
                                'hp' => 'HP%',
                                'atk' => 'ATK%',
                                'def' => 'DEF%',
                                'be' => 'Break Effect%',
                                'er' => 'Energy Regeneration Rate%',
                            ]),
                    ])->columns(2),

                Forms\Components\Section::make('Substats')
                    ->schema([
                        Forms\Components\Repeater::make('substats')
                            ->schema([
                                Forms\Components\Select::make('type')
                                    ->options([
                                        'hp' => 'HP',
                                        'hp_percent' => 'HP%',
                                        'atk' => 'ATK',
                                        'atk_percent' => 'ATK%',
                                        'def' => 'DEF',
                                        'def_percent' => 'DEF%',
                                        'spd' => 'SPD',
                                        'cr' => 'CRIT Rate%',
                                        'cd' => 'CRIT DMG%',
                                        'ehr' => 'Effect Hit Rate%',
                                        'res' => 'Effect RES%',
                                        'be' => 'Break Effect%',
                                    ])
                                    ->required(),

                                Forms\Components\TextInput::make('value')
                                    ->numeric()
                                    ->step(0.1)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Substat')
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Eidolon')
                    ->schema([
                        Forms\Components\Select::make('eidolon_level')
                            ->label('Eidolon Level')
                            ->options([
                                0 => 'E0',
                                1 => 'E1',
                                2 => 'E2',
                                3 => 'E3',
                                4 => 'E4',
                                5 => 'E5',
                                6 => 'E6',
                            ])
                            ->default(0),
                    ]),

                Forms\Components\Section::make('Relic Sets')
                    ->schema([
                        Forms\Components\Repeater::make('relic_sets')
                            ->schema([
                                Forms\Components\Select::make('relic_id')
                                    ->label('Relic Set')
                                    ->options(Relic::where('type', 'relic')->pluck('name', 'id'))
                                    ->required()
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\Select::make('pieces')
                                    ->label('Pieces')
                                    ->options([
                                        2 => '2-Piece',
                                        4 => '4-Piece',
                                    ])
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Relic Set')
                            ->maxItems(2) // Maximum 2 relic sets (4+0 or 2+2)
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Planar Ornament')
                    ->schema([
                        Forms\Components\Select::make('planar_ornament_ids')
                            ->label('Planar Ornament Sets')
                            ->options(Relic::where('type', 'planar')->pluck('name', 'id'))
                            ->multiple()
                            ->searchable()
                            ->preload(),
                    ]),

                Forms\Components\Section::make('Synergy')
                    ->schema([
                        Forms\Components\Select::make('synergy_character_ids')
                            ->label('Synergy Characters')
                            ->options(Character::all()->pluck('name', 'id'))
                            ->multiple()
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('character.name')
                    ->label('Character')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('character.profile_image')
                    ->label('Character Image')
                    ->size(40)
                    ->circular(),

                Tables\Columns\TextColumn::make('eidolon_level')
                    ->label('Eidolon')
                    ->formatStateUsing(fn ($state) => $state ? "E{$state}" : 'E0'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('character_id')
                    ->label('Character')
                    ->options(Character::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuilds::route('/'),
            'create' => Pages\CreateBuild::route('/create'),
            'view' => Pages\ViewBuild::route('/{record}'),
            'edit' => Pages\EditBuild::route('/{record}/edit'),
        ];
    }
}
