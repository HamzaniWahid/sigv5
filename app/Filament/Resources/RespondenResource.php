<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RespondenResource\Pages;
use App\Filament\Resources\RespondenResource\RelationManagers;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Responden;
use App\Models\Sekolah;
use App\Models\Survey;
use App\Models\User;
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

class RespondenResource extends Resource
{
    protected static ?string $model = Responden::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'Survei';
    protected static ?int $navigationSort = 6;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->label('Nama'),
                Select::make('jenis_kelamin')->options([
                    'laki-laki' => 'Laki-Laki',
                    'perempuan' => 'Perempuan'
                ])->label('Jenis-Kelamin'),
                Select::make('user_id')->options(
                    User::all()->pluck('name', 'id')
                )->label('User'),
                Select::make('survey_id')->options(
                    Survey::all()->pluck('nama', 'id')
                )->label('Survei'),
                Select::make('sekolah_id')->options(
                    Sekolah::all()->pluck('nama', 'id')
                )->label('Sekolah'),
                Select::make('jurusan_id')->options(
                    Jurusan::all()->pluck('nama', 'id')
                )->label('Jurusan'),
                Select::make('kelas_id')->options(
                    Kelas::all()->pluck('nama', 'id')
                )->label('Kelas'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('jenis_kelamin'),
                TextColumn::make('sekolah.nama'),
                TextColumn::make('jurusan.nama'),
                TextColumn::make('kelas.nama'),
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
            RelationManagers\HasilRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRespondens::route('/'),
            'create' => Pages\CreateResponden::route('/create'),
            'view' => Pages\ViewResponden::route('/{record}'),
            'edit' => Pages\EditResponden::route('/{record}/edit'),
        ];
    }    
}
