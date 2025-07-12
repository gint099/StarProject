<?php
namespace App\Filament\Resources;

use App\Filament\Resources\CharacterResource\Pages;
use App\Models\Character;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class CharacterResource extends Resource
{
    protected static ?string $model = Character::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Database';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),

            FileUpload::make('image')
                ->image()
                ->directory('characters')
                ->required(),

            FileUpload::make('background_image')
                ->label('Background Image (Show Page Left Side)')
                ->image()
                ->directory('characters/backgrounds')->required(),

            FileUpload::make('profile_image')
                ->label('Profile Image (Top Right Info Section)')
                ->image()
                ->directory('characters/profiles')->required(),

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

            select::make('element')
                ->options([
                    'Physical' => 'Physical',
                    'Fire' => 'Fire',
                    'Ice' => 'Ice',
                    'Lightning' => 'Lightning',
                    'Wind' => 'Wind',
                    'Quantum' => 'Quantum',
                    'Imaginary' => 'Imaginary',
                ])
                ->required(),

            Select::make('archetype')
                ->label('Role / Archetype')
                ->options([
                    'crit' => 'Crit',
                    'break' => 'Break',
                    'fua' => 'Follow-Up Attack (FuA)',
                    'dot' => 'Damage over Time (DoT)',
                ])
                ->nullable()
                ->searchable(),


            Select::make('rarity')
                ->options([
                    5 => '5 ★',
                    4 => '4 ★',
                ])
                ->required(),

            TextInput::make('hp')->numeric()->required(),
            TextInput::make('atk')->numeric()->required(),
            TextInput::make('def')->numeric()->required(),
            TextInput::make('spd')->numeric()->required(),
            TextInput::make('taunt')->numeric()->required(),

            Repeater::make('skills')
                ->schema([
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required(),
                    FileUpload::make('image')
                        ->image()
                        ->directory('skills'),
                ])
                ->columnSpanFull()
                ->label('Skills'),

            FileUpload::make('summon_image')
                ->image()
                ->directory('summons')
                ->label('Summon Image'),

            TextInput::make('summon_name')
                ->label('Summon Name'),

                Repeater::make('summons')
                ->label('Summons')
                ->schema([
                    TextInput::make('name')->required(),
                    FileUpload::make('image')
                        ->image()
                        ->directory('summons')
                        ->required(),
                    Textarea::make('description')->required(),
                ])
                ->columns(1)
                ->collapsed()
                ->grid(1)
                ->collapsible(),


            Repeater::make('traces')
                ->schema([
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required(),
                    FileUpload::make('image')
                        ->image()
                        ->directory('traces'),
                ])
                ->columnSpanFull()
                ->label('Traces'),

            Repeater::make('eidolons')
                ->schema([
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required(),
                    FileUpload::make('image')
                        ->image()
                        ->directory('eidolons'),
                ])
                ->label('Eidolons')
                ->columnSpanFull(),

            Repeater::make('story')
                ->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('detail, story 1, 2, 3, 4')
                        ->required(),

                    Textarea::make('text')
                    ->label('Story Content')
                    ->rows(4)
                    ->required(),
            ])
            ->label('Character Story')
            ->columnSpanFull()
            ->addActionLabel('Add Story Section')
            // ->orderable() // Ini memungkinkan urutan bisa diatur manual



        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Portrait')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('path'),
                Tables\Columns\TextColumn::make('rarity')->sortable(),
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
            'index' => Pages\ListCharacters::route('/'),
            'create' => Pages\CreateCharacter::route('/create'),
            'edit' => Pages\EditCharacter::route('/{record}/edit'),
        ];
    }
}
