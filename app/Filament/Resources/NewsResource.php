<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\Character;
use App\Models\Lightcone;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Database';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),

            FileUpload::make('image')
                ->directory('news')
                ->image()
                ->required(),

            Textarea::make('description')
                ->required(),

            Toggle::make('is_featured')
                ->default(false),

            Select::make('type')
                ->label('Tipe Konten')
                ->options([
                    'character' => 'Character',
                    'lightcone' => 'Lightcone',
                ])
                ->required()
                ->reactive(),

            Select::make('related_id')
                ->label('Terkait')
                ->options(function (callable $get) {
                    return match ($get('type')) {
                        'character' => Character::all()->pluck('name', 'id'),
                        'lightcone' => Lightcone::all()->pluck('name', 'id'),
                        default => collect(),
                    };
                })
                ->required()
                ->searchable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image'),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('type')->sortable(),
                Tables\Columns\IconColumn::make('is_featured')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'character' => 'Character',
                        'lightcone' => 'Lightcone',
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
