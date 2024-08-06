<?php

namespace App\Filament\Resources\RespondenResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HasilRelationManager extends RelationManager
{
    protected static string $relationship = 'hasil';

    protected static ?string $recordTitleAttribute = 'kuisioner_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kuisioner_id')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kuisioner.pertanyaan')->wrap(),
                BadgeColumn::make('kuisioner.level')->label('Type')
                ->enum([
                    '1' => 'Sub',
                    '0' => 'Utama',
                ]),
                TextColumn::make('jawaban.jawaban'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
