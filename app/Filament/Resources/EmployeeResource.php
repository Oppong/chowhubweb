<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class EmployeeResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $slug = 'employees';

    protected static ?string $modelLabel = 'Employee';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Main Pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),

                TextInput::make('email')
                ->required()
                ->maxLength(255)
                ->label('Email Address')
                ->helperText('The Email Address must be unique')
                ->email()
                ->unique(User::class)->hiddenOn('edit'),

                TextInput::make('password')
                ->password()
                ->required()
                ->minLength(8)
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))->hiddenOn('edit'),

                TextInput::make('phone')->required()->tel(),
                TextInput::make('location')->maxLength(255),
                Select::make('gender')->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                ]),
                TextInput::make('role')->default('2')->disabled(),
                TextInput::make('employee_id')->hidden()->default(User::generateEmployeeId())->hiddenOn('edit'),

                FileUpload::make('image')->image()->helperText('Picture of Employee'),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->size('sm'),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable()->size('sm'),
                Tables\Columns\TextColumn::make('phone')->searchable()->sortable()->size('sm'),
                Tables\Columns\TextColumn::make('location')->searchable()->sortable()->size('sm'),
                Tables\Columns\TextColumn::make('employee_id')->size('sm'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('employee_id', '!=', null);
    }
}
