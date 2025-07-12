<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Character;
use Filament\Forms\Form;
use App\Models\BossGuide;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BossGuideResource\Pages;


class BossGuideResource extends Resource
{
    protected static ?string $model = BossGuide::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // 📌 Section 1: Basic Info
            TextInput::make('name')->required(),
            Select::make('boss_type')
                ->options([
                    'Weekly' => 'Weekly Boss',
                    'Field' => 'Field Boss',
                    'Story' => 'Story Boss',
                ])->required(),

            FileUpload::make('image')->image()->required(),
            TextInput::make('location')->required(),
            Forms\Components\FileUpload::make('location_image')
                ->label('Location Image')
                ->image()
                ->directory('boss-locations')
                ->nullable(),
            TextInput::make('recommended_level')->numeric(),

            // 📌 Section 2: Reset Info
            Select::make('reset_schedule')
                ->options([
                    'Weekly Reset (Monday)' => 'Weekly Reset (Monday)',
                    'Anytime' => 'Anytime',
                    'Story-Based' => 'Story-Based',
                ])->required(),
            TextInput::make('trailblaze_cost')->numeric()->default(30),

            // 📌 Section 4: Element Info
            Select::make('weaknesses')
                ->multiple()
                ->options([
                    'Physical' => 'Physical Element',
                    'Fire' => 'Fire Element',
                    'Ice' => 'Ice Element',
                    'Lightning' => 'Lightning Element',
                    'Wind' => 'Wind Element',
                    'Quantum' => 'Quantum Element',
                    'Imaginary' => 'Imaginary Element',
                ]),

            Select::make('resistances')
                ->multiple()
                ->options([
                    'Physical' => 'Physical',
                    'Fire' => 'Fire',
                    'Ice' => 'Ice',
                    'Lightning' => 'Lightning',
                    'Wind' => 'Wind',
                    'Quantum' => 'Quantum',
                    'Imaginary' => 'Imaginary',
                ]),

            // 📌 Section 5: Teams
            Repeater::make('team_roles')->schema([
                Select::make('role')->options([
                    'DPS' => 'DPS',
                    'Sub-DPS' => 'Sub-DPS',
                    'Support' => 'Support',
                    'Sustain' => 'Sustain',
                ])->required(),
                Select::make('character_id')
                    ->label('Character')
                    ->options(Character::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
            ])->columns(2),

            // 📌 Section 6: Strategy
            Repeater::make('phase_strategies')->schema([
                TextInput::make('phase'),
                Textarea::make('strategy')->rows(3),
                FileUpload::make('strategy_media')
                    ->label('Image or Video')
                    ->directory('boss-strategies')
                    ->acceptedFileTypes(['image/*', 'video/mp4', 'video/webm']) // ← tambahkan ini
                    ->nullable(),
            ]),
            Textarea::make('common_mistakes')->rows(3),
            Textarea::make('pro_tips')->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable()->label('Boss'),
                TextColumn::make('boss_type')->label('Tipe'),
                ImageColumn::make('image')->label('Gambar'),
                TextColumn::make('reset_schedule')->label('Reset')->sortable(),
                TextColumn::make('created_at')->date()->label('Dibuat'),
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
            'index' => Pages\ListBossGuides::route('/'),
            'create' => Pages\CreateBossGuide::route('/create'),
            'edit' => Pages\EditBossGuide::route('/{record}/edit'),
        ];
    }
}
