<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JawabanResource\Pages;
use App\Filament\Resources\JawabanResource\RelationManagers;
use App\Models\Jawaban;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JawabanResource extends Resource
{
    protected static ?string $model = Jawaban::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Survei';
    protected static ?string $navigationLabel = 'Jawaban Kuisioner';
    protected static ?int $navigationSort = 3;
    protected static function getNavigationBadgeColor(): ?string
{
    return static::getModel()::count() > 10 ? 'warning' : 'primary';
}
    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('jawaban'),
                TextInput::make('keterangan'),
                TextInput::make('lainnya'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jawaban')->searchable(),
                TextColumn::make('keterangan'),
                TextColumn::make('lainnya')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListJawabans::route('/'),
            'create' => Pages\CreateJawaban::route('/create'),
            'view' => Pages\ViewJawaban::route('/{record}'),
            'edit' => Pages\EditJawaban::route('/{record}/edit'),
        ];
    }    
}
