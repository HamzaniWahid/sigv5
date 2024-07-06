<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuisionerResource\Pages;
use App\Filament\Resources\KuisionerResource\RelationManagers;
use App\Models\Kuisioner;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KuisionerResource extends Resource
{
    protected static ?string $model = Kuisioner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('pertanyaan')
                ->required(),
                Select::make('tipe')
                ->options([
                    'isian' => 'Isian',
                    'pilihan_ganda' => 'Pilhan Ganda',
                ])
                ->required(),
                TextInput::make('level')
                ->numeric(),
                TextInput::make('syarat')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pertanyaan'),
                TextColumn::make('tipe'),
                TextColumn::make('level'),
                TextColumn::make('syarat'),
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
            RelationManagers\KuisionerJawabanRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKuisioners::route('/'),
            'create' => Pages\CreateKuisioner::route('/create'),
            'edit' => Pages\EditKuisioner::route('/{record}/edit'),
        ];
    }    
}
