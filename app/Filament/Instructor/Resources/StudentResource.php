<?php

namespace App\Filament\Instructor\Resources;

use App\Filament\Instructor\Resources\StudentResource\Pages;
use App\Filament\Instructor\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Sistema de gestión para instructores';

    protected static ?string $label = 'Estudiantes';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->label('Apellido')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('document')
                    ->label('Documento')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age')
                    ->label('Edad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('group_id')
                    ->relationship(name: 'group', titleAttribute: 'name') // el title sirve para mostrar el campo de la bd
                    ->label('Nombre del grupo')
                    ->placeholder('Seleccione el nombre del grupo')
                    ->required()


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastname')->label('Apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('document')->label('Documento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')->label('Edad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('group.name')->label('Grupo')
                    ->searchable(),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
                Tables\Actions\DeleteAction::make()->label('Eliminar'),
                Tables\Actions\ViewAction::make()->label('Ver'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
