<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartyResource\Pages;
use App\Models\Party;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PartyResource extends Resource
{
    protected static ?string $model = Party::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),
            Select::make('type')
                ->options([
                    'F2P' => 'F2P',
                    'Hypercarry' => 'Hypercarry',
                    'Dual DPS' => 'Dual DPS',
                    'Mono Element' => 'Mono Element',
                    'premium' => 'Premium',
                ])
                ->required(),

            Select::make('dps_id')
                ->label('Main DPS')
                ->relationship('dps', 'name')
                ->searchable()
                ->required(),

            Select::make('sub_dps_id')
                ->label('Sub DPS')
                ->relationship('subDps', 'name')
                ->searchable(),

            Select::make('support_id')
                ->label('Support')
                ->relationship('support', 'name')
                ->searchable(),

            Select::make('sustain_id')
                ->label('Sustain')
                ->relationship('sustain', 'name')
                ->searchable(),

            Textarea::make('description')
                ->rows(4)
                ->label('Team Strategy / Notes'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('type'),
                ImageColumn::make('dps.image')
                    ->label('Main Character')
                    ->square()
                    ->circular()
                    ->width(50)
                    ->height(50),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParties::route('/'),
            'create' => Pages\CreateParty::route('/create'),
            // 'view' => Pages\ViewParty::route('/{record}'),
            'edit' => Pages\EditParty::route('/{record}/edit'),
        ];
    }
}
