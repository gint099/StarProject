<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LightconeResource\Pages;
use App\Models\Lightcone;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LightconeResource extends Resource
{
    protected static ?string $model = Lightcone::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Database';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),

            FileUpload::make('image')
                ->image()
                ->directory('lightcones')
                ->required(),

            FileUpload::make('background_image')
                ->image()
                ->directory('lightcones/backgrounds')
                ->label('Background Image'),

            FileUpload::make('profile_image')
                ->image()
                ->directory('lightcones/profile')
                ->label('Profile Image'),

            Select::make('path')
                ->options([
                    'Destruction' => 'Destruction',
                    'Hunt' => 'Hunt',
                    'Erudition' => 'Erudition',
                    'Harmony' => 'Harmony',
                    'Nihility' => 'Nihility',
                    'Preservation' => 'Preservation',
                    'Abundance' => 'Abundance',
                    'Remembrance' => 'Remembrance',
                ])
                ->required(),

            Select::make('rarity')
                ->options([
                    5 => '5 ★',
                    4 => '4 ★',
                ])
                ->required(),

            TextInput::make('hp')->numeric()->required(),
            TextInput::make('atk')->numeric()->required(),
            TextInput::make('def')->numeric()->required(),

            TextInput::make('superimposition_name')->label('Superimposition Name')->required(),

            Textarea::make('superimposition_lv1')->label('Effect Lv 1'),
            Textarea::make('superimposition_lv2')->label('Effect Lv 2'),
            Textarea::make('superimposition_lv3')->label('Effect Lv 3'),
            Textarea::make('superimposition_lv4')->label('Effect Lv 4'),
            Textarea::make('superimposition_lv5')->label('Effect Lv 5'),

            Repeater::make('story')
                ->schema([
                    Textarea::make('text')->label('Story Section')->rows(3),
                ])
                ->label('Story')
                ->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Icon')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('path')->sortable(),
                Tables\Columns\TextColumn::make('rarity')->sortable(),
                Tables\Columns\TextColumn::make('superimposition_name')->label('Effect Name'),
            ])
            ->filters([])
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
            'index' => Pages\ListLightcones::route('/'),
            'create' => Pages\CreateLightcone::route('/create'),
            'edit' => Pages\EditLightcone::route('/{record}/edit'),
        ];
    }
}
