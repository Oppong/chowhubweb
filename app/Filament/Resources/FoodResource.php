<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodResource\Pages;
use App\Filament\Resources\FoodResource\RelationManagers;
use App\Models\Food;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class FoodResource extends Resource
{
    protected static ?string $model = Food::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Main Pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required()
                ->maxLength(255),

                TextInput::make('price')
                ->required()
                ->numeric()
                ->maxLength(255),

                Select::make('status')
                ->required()
                ->options([
                    'enabled' => 'Enabled',
                    'disabled' => 'Disabled'
                ]),

                TextInput::make('discount_percentage')
                ->numeric(),

                FileUpload::make('image')->image()->helperText('Image of Food'),

                Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->createOptionForm([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),


                    Textarea::make('description')
                        ->required()
                        ->helperText('The Description of this category'),
                ]),


                Textarea::make('description')
                    ->required()
                    ->helperText('The Description of this category'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')->searchable()->sortable()->size('sm'),
                TextColumn::make('description')->searchable()->sortable()->size('sm')->limit(40),
                TextColumn::make('price')->searchable()->sortable()->size('sm'),
                TextColumn::make('category.name')->searchable()->sortable()->size('sm'),
                TextColumn::make('discount_percentage')->searchable()->sortable()->size('sm'),
                TextColumn::make('status')->searchable()->sortable()->size('sm'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFood::route('/'),
            'create' => Pages\CreateFood::route('/create'),
            'edit' => Pages\EditFood::route('/{record}/edit'),
        ];
    }
}
