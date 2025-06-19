<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RelicResource\Pages;
use App\Models\Relic;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class RelicResource extends Resource
{
    protected static ?string $model = Relic::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Database';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('type')
                ->options([
                    'relic' => 'Relic Set',
                    'planar' => 'Planar Ornament',
                ])
                ->required()
                ->reactive(),

            TextInput::make('name')->required(),

            FileUpload::make('image')
                ->image()
                ->directory('relics')
                ->required(),

            FileUpload::make('head_image')
                ->image()
                ->directory('relics/head')
                ->label('head Image')
                ->required()
                ->visible(fn ($get) => $get('type') === 'relic'),

            FileUpload::make('hand_image')
                ->image()
                ->directory('relics/hand')
                ->label('hand Image')
                ->required()
                ->visible(fn ($get) => $get('type') === 'relic'),

            FileUpload::make('body_image')
                ->image()
                ->directory('relics/body')
                ->label('Body Image')
                ->required()
                ->visible(fn ($get) => $get('type') === 'relic'),

            FileUpload::make('boots_image')
                ->image()
                ->directory('relics/boots')
                ->label('boots Image')
                ->required()
                ->visible(fn ($get) => $get('type') === 'relic'),

            FileUpload::make('planar_image')
                ->image()
                ->directory('relics/planar')
                ->label('planar Image')
                ->required()
                ->visible(fn ($get) => $get('type') === 'planar'),


            FileUpload::make('rope_image')
                ->image()
                ->directory('relics/rope')
                ->label('rope Image')
                ->required()
                ->visible(fn ($get) => $get('type') === 'planar'),

            Select::make('rarity')
                ->options([
                    5 => '5 ★',
                    4 => '4 ★',
                ])
                ->required(),

            Textarea::make('set_bonus_2')
                ->label('Set Bonus (2 Pieces)')
                ->rows(3)
                ->required(),

            Textarea::make('set_bonus_4')
                ->label('Set Bonus (4 Pieces)')
                ->rows(3)
                ->visible(fn ($get) => $get('type') === 'relic'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Icon'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('type')->sortable(),
                Tables\Columns\TextColumn::make('rarity')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'relic' => 'Relic Set',
                        'planar' => 'Planar Ornament',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRelics::route('/'),
            'create' => Pages\CreateRelic::route('/create'),
            'edit' => Pages\EditRelic::route('/{record}/edit'),
        ];
    }
}
