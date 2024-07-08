<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuisionerResource\Pages;
use App\Filament\Resources\KuisionerResource\RelationManagers;
use App\Models\Kuisioner;
use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;

class KuisionerResource extends Resource
{
    protected static ?string $model = Kuisioner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('surveys_id')->label('Surveys')
                    ->options(Survey::all()->pluck('nama', 'id'))->required(),
                Textarea::make('pertanyaan')->required(),
                // Select::make('tipe')->options(['isian'=>'Isian','pilihanganda'=>'Pilihan Ganda'])->default('pilihanganda'),
                Toggle::make('level')->label('Sub Pertanyaan?')->inline(false)->reactive(),
                Select::make('syarat')->label('Dari Pertanyaan:')->options(Kuisioner::all()->pluck('pertanyaan', 'id'))
                    ->hidden(fn(Closure $get) => $get('level') !== true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('surveys.nama'),
                TextColumn::make('pertanyaan'),
                // TextColumn::make('tipe'),
                TextColumn::make('level'),
                TextColumn::make('syarat'),
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
            RelationManagers\JawabansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKuisioners::route('/'),
            'create' => Pages\CreateKuisioner::route('/create'),
            'view' => Pages\ViewKuisioner::route('/{record}'),
            'edit' => Pages\EditKuisioner::route('/{record}/edit'),
        ];
    }
}
