<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuisionerJawabanResource\Pages;
use App\Filament\Resources\KuisionerJawabanResource\RelationManagers;
use App\Models\Kuisioner;
use App\Models\KuisionerJawaban;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KuisionerJawabanResource extends Resource
{
    protected static ?string $model = KuisionerJawaban::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kuisioner_id')->label('Kuisioner')
                ->options(
                    Kuisioner::all()->pluck('pertanyaan', 'id')
                ),
                TextInput::make('jawaban'),
                TextInput::make('keterangan'),
                TextInput::make('lainnya'),
                TextInput::make('level'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListKuisionerJawabans::route('/'),
            'create' => Pages\CreateKuisionerJawaban::route('/create'),
            'view' => Pages\ViewKuisionerJawaban::route('/{record}'),
            'edit' => Pages\EditKuisionerJawaban::route('/{record}/edit'),
        ];
    }    
}
